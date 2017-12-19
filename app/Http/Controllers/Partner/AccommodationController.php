<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Accommodation\AccomVenuPromo;
use App\Model\Accommodation\AccommodationList;
use App\Model\Accommodation\AccomVenuPromosImage;
use App\Model\RoomList\RoomList;
use App\Model\RoomList\RoomDetail;
use App\Model\AmenityList\AmenityList;
use App\Model\AmenityList\AmenityDetail;
use App\Model\ActivityList\ActivityList;
use App\Model\ActivityList\ActivityDetail;
use App\Model\SurroundingList\SurroundingList;
use App\Model\SurroundingList\SurroundingDetail;
use App\Model\State\State;
use App\Model\Country\Country;
use App\Model\City\City;
use App\Http\Requests\Partner\AccommodationRequest;
use App\Http\Requests\Partner\ActivityDetailRequest;
use App\Http\Requests\Partner\RoomDetailRequest;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;

class AccommodationController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            $this->middleware('auth:admin');
            $this->middleware('partner');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $user = Auth::guard('admin')->user();

            return view('partner.accommodation.index')->with(compact('user'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        try {
            $user = Auth::guard('admin')->user();
            $accomm_data = new AccommodationList;
            $room_data = new RoomList;
            $surr_data = new SurroundingList;
            $country = new Country;
            $amenity = new AmenityList;
            $activity = new ActivityList;

            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'DESC')->where('status', 1)->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_room = $room_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_surr = $surr_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_amenity = $amenity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_activity = $activity->select('id', 'name')->orderBy('id', 'ASC')->get();

            return view('partner.accommodation.create')->with(compact('user', 'arr_accomm', 'arr_country', 'arr_room', 'arr_surr', 'arr_amenity', 'arr_activity'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationRequest $request) {

        try {

            $accommodation = new AccomVenuPromo;
            $accommodation->title = $request->name;
            $accommodation->slug = str_slug($request->name, '-');
            $accommodation->accom_type_id = $request->accom_type;
            $accommodation->establish_details = $request->establish_details;
            $accommodation->rating = $request->rating;
            $accommodation->reserve_email = $request->reserving_email;
            $accommodation->country_id = $request->country;
            $accommodation->state_id = $request->state;
            $accommodation->city_id = $request->city;
            $accommodation->street_address = $request->street_address;
            $accommodation->area = $request->area;
            $accommodation->contact_no = $request->contact_no;
            $accommodation->alternate_no = $request->alternate_no;
            $accommodation->created_by = Auth::user()->id;
            $accommodation->type = $request->type;

            if ($accommodation->save()) {

                if (!empty($accommodation->id)) {

                    /* product multiple image upload */
                    if ($request->file('accomm_images')) {
                        $files = $request->file('accomm_images');

                        $uploadcount = 0;
                        foreach ($files as $k => $file) {
                            $rules = array('accomm_images' => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                            $validator = Validator::make(array('accomm_images' => $file), $rules);
                            if ($validator->passes()) {

                                $filename = $accommodation->id . '_' . $file->getClientOriginalName();

                                // make thumb nail of image
                                $destinationThumb = 'accom_venu_promo_images/thumbnail';
                                if (!file_exists($destinationThumb)) {
                                    mkdir($destinationThumb, 0777, true);
                                }

                                // image reszie
                                $destinationResize = 'accom_venu_promo_images/resize';
                                if (!file_exists($destinationResize)) {
                                    mkdir($destinationResize, 0777, true);
                                }

                                $img = Image::make($file->getRealPath());

                                $img->resize(80, 80, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($destinationThumb . '/' . $filename);

                                $img = Image::make($file->getRealPath());
                                $img->resize(300, 300, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($destinationResize . '/' . $filename);

                                $destinationPath = 'accom_venu_promo_images';
                                $file->move($destinationPath, $filename);

                                /* add image name in database */
                                $image = new AccomVenuPromosImage;
                                $image->accom_venu_pro_id = $accommodation->id;
                                $image->image_name = $filename;

                                if ($accommodation->id == '' && $k == 0) {
                                    $image->status = 1;
                                }

                                $image->save();

                                $uploadcount ++;
                            }
                        }
                    }
                }

                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }
            $request->session()->flash($flag, $msg);
            $request->session()->put('accom_id', $accommodation->id);
            $request->session()->put('tab_type', 2);
            return redirect(route('accomodation.create'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function roomDetail(RoomDetailRequest $request) {

        try {

            $acco_id = '';

            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            }

            $cnt = count($request->room_type);
            $room_detail = new RoomDetail;

            for ($i = 0; $i < $cnt; $i++) {

                $room_detail->accom_venu_promos_id = $acco_id;
                $room_detail->room_type_id = $request->room_type[$i];
                $room_detail->guest = $request->guest[$i];
                $room_detail->available = $request->room_avail[$i];
                $room_detail->price = $request->room_price[$i];
                $room_detail->desc = $request->desc;
                $room_detail->short_desc = $request->room_short_desc[$i];
                $room_detail->room_image = ( isset($request->room_img[$i]) && !empty($request->room_img[$i]) ? $request->room_img[$i]->getClientOriginalName() : '');
                $room_detail->type = $request->type;
                $room_detail->created_by = Auth::user()->id;

                if ($room_detail->save()) {
                    /* room multiple image upload */
                    $files = "";
                    if ($request->file('room_img')) {
                        if (isset($request->file('room_img')[$i]) && !empty($request->file('room_img')[$i])) {
                            
                            $files = $request->file('room_img')[$i];
                        }

                        $uploadcount = 0;
                        $rules = array('room_img' => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                        $validator = Validator::make(array('room_img' => $files), $rules);
                        if ($validator->passes()) {

                            $filename = $room_detail->id . '_' . $files->getClientOriginalName();

                            // make thumb nail of image
                            $destinationThumb = 'room_images/thumbnail';
                            if (!file_exists($destinationThumb)) {
                                mkdir($destinationThumb, 0777, true);
                            }

                            // image reszie
                            $destinationResize = 'room_images/resize';
                            if (!file_exists($destinationResize)) {
                                mkdir($destinationResize, 0777, true);
                            }

                            $img = Image::make($files->getRealPath());

                            $img->resize(80, 80, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save($destinationThumb . '/' . $filename);

                            $img = Image::make($files->getRealPath());
                            $img->resize(300, 300, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save($destinationResize . '/' . $filename);

                            $destinationPath = 'room_images';
                            $files->move($destinationPath, $filename);

                            $uploadcount ++;
                        }
                    }

                    $flg = '1';
                    $msg = "Record Added Successfully";
                } else {
                    $flg = '0';
                    $msg = "Record not Added Successfully";
                }
            }

            if (isset($flg) && !empty($flg)) {
                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }

            $request->session()->flash($flag, $msg);
            $request->session()->put('tab_type', 2);
            return redirect(route('accomodation.create'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activityDetail(ActivityDetailRequest $request) {

        try {

            $acco_id = '';

            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            }

            $cnt = count($request->amenity_property);
            $activity_cnt = count($request->activity_property);
            $attarc_cnt = count($request->attraction_name);

            $amenity_detail = new AmenityDetail;
            $activity_detail = new ActivityDetail;
            $surr_detail = new SurroundingDetail;

            for ($i = 0; $i < $cnt; $i++) {

                $amenity_detail->accom_venu_promos_id = $acco_id;
                $amenity_detail->desc = $request->amenity_desc;
                $amenity_detail->amenity_id = $request->amenity_property[$i];
                $amenity_detail->type = $request->type;
                $amenity_detail->created_by = Auth::user()->id;

                if ($amenity_detail->save()) {
                    $flg = '1';
                    $msg = "Record Added Successfully";
                } else {
                    $flg = '0';
                    $msg = "Record not Added Successfully";
                }
            }

            for ($j = 0; $j < $activity_cnt; $j++) {

                $activity_detail->accom_venu_promos_id = $acco_id;
                $activity_detail->desc = $request->activity_desc;
                $activity_detail->activity_id = $request->activity_property[$j];
                $activity_detail->type = $request->type;
                $activity_detail->created_by = Auth::user()->id;

                if ($activity_detail->save()) {
                    $flg = '1';
                    $msg = "Record Added Successfully";
                } else {
                    $flg = '0';
                    $msg = "Record not Added Successfully";
                }
            }

            for ($k = 0; $k < $attarc_cnt; $k++) {

                $surr_detail->accom_venu_promos_id = $acco_id;
                $surr_detail->name = $request->attraction_name[$k];
                $surr_detail->surrounding_id = $request->surrounding[$k];
                $surr_detail->distance = $request->approx_dist[$k];
                $surr_detail->shuttle = $request->shuttle;
                $surr_detail->type = $request->type;
                $surr_detail->created_by = Auth::user()->id;

                if ($surr_detail->save()) {
                    $flg = '1';
                    $msg = "Record Added Successfully";
                } else {
                    $flg = '0';
                    $msg = "Record not Added Successfully";
                }
            }

            if (isset($flg) && !empty($flg)) {
                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }

            $request->session()->flash($flag, $msg);
            $request->session()->put('tab_type', 4);
            return redirect(route('accomodation.create'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
