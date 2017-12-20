<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Accommodation\AccomVenuPromo;
use App\Model\Accommodation\AccommodationList;
use App\Model\Accommodation\AccomVenuPromosImage;
use App\Model\RoomList\RoomList;
use App\Model\RoomList\RoomDetail;
use App\Model\Venu\VenuDetail;
use App\Model\Conference\ConferenceDetail;
use App\Model\AmenityList\AmenityList;
use App\Model\AmenityList\AmenityDetail;
use App\Model\ActivityList\ActivityList;
use App\Model\ActivityList\ActivityDetail;
use App\Model\SurroundingList\SurroundingList;
use App\Model\SurroundingList\SurroundingDetail;
use App\Model\PaymentModeList\PaymentModeList;
use App\Model\PaymentModeList\PaymentAccept;
use App\Model\Policy\PoliciyDetail;
use App\Model\Offer\OfferDetail;
use App\Model\State\State;
use App\Model\Country\Country;
use App\Model\City\City;
use App\Http\Requests\Partner\AccommodationRequest;
use App\Http\Requests\Partner\ActivityDetailRequest;
use App\Http\Requests\Partner\RoomDetailRequest;
use App\Http\Requests\Partner\PolicyDetailRequest;
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
            $payment_list = new PaymentModeList;


            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'DESC')->where('status', 1)->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_room = $room_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_surr = $surr_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_amenity = $amenity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_activity = $activity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_payment = $payment_list->select('id', 'name')->orderBy('id', 'ASC')->get();

            return view('partner.accommodation.create')->with(compact('user', 'arr_accomm', 'arr_country', 'arr_room', 'arr_surr', 'arr_amenity', 'arr_activity', 'arr_payment'));
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
            $venu_cnt = count($request->venue_name);
            $confer_cnt = count($request->confer_name);




            for ($i = 0; $i < $cnt; $i++) {
                $room_detail = new RoomDetail;
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

            for ($j = 0; $j < $venu_cnt; $j++) {
                $venu_detail = new VenuDetail;
                $venu_detail->accom_venu_promos_id = $acco_id;
                $venu_detail->desc = $request->venu_desc;
                $venu_detail->name = $request->venue_name[$j];
                $venu_detail->capacity = $request->venu_capacity[$j];
                $venu_detail->price = $request->venue_price[$j];
                $venu_detail->short_desc = $request->venue_short_descr[$j];
                $venu_detail->venu_image = ( isset($request->venue_img[$j]) && !empty($request->venue_img[$j]) ? $request->venue_img[$j]->getClientOriginalName() : '');
                $venu_detail->type = $request->type;
                $venu_detail->created_by = Auth::user()->id;

                if ($venu_detail->save()) {
                    /* room multiple image upload */
                    $venu_files = "";
                    if ($request->file('venu_img')) {
                        if (isset($request->file('venu_img')[$j]) && !empty($request->file('venu_img')[$j])) {

                            $venu_files = $request->file('venu_img')[$j];
                        }

                        $venu_uploadcount = 0;
                        $venu_rules = array('venu_img' => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                        $venu_validator = Validator::make(array('venu_img' => $venu_files), $venu_rules);
                        if ($venu_validator->passes()) {

                            $venu_filename = $venu_detail->id . '_' . $venu_files->getClientOriginalName();

                            // make thumb nail of image
                            $venu_destinationThumb = 'venu_images/thumbnail';
                            if (!file_exists($venu_destinationThumb)) {
                                mkdir($venu_destinationThumb, 0777, true);
                            }

                            // image reszie
                            $venu_destinationResize = 'venu_images/resize';
                            if (!file_exists($venu_destinationResize)) {
                                mkdir($venu_destinationResize, 0777, true);
                            }

                            $venu_img = Image::make($venu_files->getRealPath());

                            $venu_img->resize(80, 80, function ($venu_constraint) {
                                $venu_constraint->aspectRatio();
                            })->save($venu_destinationThumb . '/' . $venu_filename);

                            $venu_img = Image::make($venu_files->getRealPath());
                            $venu_img->resize(300, 300, function ($venu_constraint) {
                                $venu_constraint->aspectRatio();
                            })->save($venu_destinationResize . '/' . $venu_filename);

                            $venu_destinationPath = 'venu_images';
                            $venu_files->move($venu_destinationPath, $venu_filename);

                            $venu_uploadcount ++;
                        }
                    }

                    $flg = '1';
                    $msg = "Record Added Successfully";
                } else {
                    $flg = '0';
                    $msg = "Record not Added Successfully";
                }
            }

            for ($k = 0; $k < $confer_cnt; $k++) {
                $confer_detail = new ConferenceDetail;
                $confer_detail->accom_venu_promos_id = $acco_id;
                $confer_detail->desc = $request->confer_desc;
                $confer_detail->name = $request->confer_name[$k];
                $confer_detail->capacity = $request->confer_avail[$k];
                $confer_detail->price = $request->confer_price[$k];
                $confer_detail->short_desc = $request->confer_short_descr[$k];
                $confer_detail->confer_image = ( isset($request->confer_img[$k]) && !empty($request->confer_img[$k]) ? $request->confer_img[$k]->getClientOriginalName() : '');
                $confer_detail->type = $request->type;
                $confer_detail->created_by = Auth::user()->id;

                if ($confer_detail->save()) {
                    /* room multiple image upload */
                    $confer_files = "";
                    if ($request->file('confer_img')) {
                        if (isset($request->file('confer_img')[$k]) && !empty($request->file('confer_img')[$k])) {

                            $confer_files = $request->file('confer_img')[$k];
                        }

                        $confer_uploadcount = 0;
                        $confer_rules = array('confer_img' => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                        $confer_validator = Validator::make(array('confer_img' => $confer_files), $confer_rules);
                        if ($confer_validator->passes()) {

                            $confer_filename = $confer_detail->id . '_' . $confer_files->getClientOriginalName();

                            // make thumb nail of image
                            $confer_destinationThumb = 'confer_images/thumbnail';
                            if (!file_exists($confer_destinationThumb)) {
                                mkdir($confer_destinationThumb, 0777, true);
                            }

                            // image reszie
                            $confer_destinationResize = 'confer_images/resize';
                            if (!file_exists($confer_destinationResize)) {
                                mkdir($confer_destinationResize, 0777, true);
                            }

                            $confer_img = Image::make($confer_files->getRealPath());

                            $confer_img->resize(80, 80, function ($confer_constraint) {
                                $confer_constraint->aspectRatio();
                            })->save($confer_destinationThumb . '/' . $confer_filename);

                            $confer_img = Image::make($confer_files->getRealPath());
                            $confer_img->resize(300, 300, function ($confer_constraint) {
                                $confer_constraint->aspectRatio();
                            })->save($confer_destinationResize . '/' . $confer_filename);

                            $conferu_destinationPath = 'confer_images';
                            $confer_files->move($conferu_destinationPath, $confer_filename);

                            $confer_uploadcount ++;
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
            $request->session()->put('tab_type', 3);
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





            for ($i = 0; $i < $cnt; $i++) {
                $amenity_detail = new AmenityDetail;
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
                $activity_detail = new ActivityDetail;
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
                $surr_detail = new SurroundingDetail;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function policyDetail(PolicyDetailRequest $request) {

        try {

            $acco_id = '';

            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            }

            $cnt = count($request->payment_type);
            $item_cnt = count($request->item);

            $policy_detail = new PoliciyDetail;

            $policy_detail->accom_venu_promos_id = $acco_id;
            $policy_detail->policy_cancel = $request->cancel;
            $policy_detail->time_in = $request->timein;
            $policy_detail->time_out = $request->timeout;
            $policy_detail->extra_child = $request->child_extra;
            $policy_detail->pets = $request->pets;
            $policy_detail->lang_spoken = $request->lang_spoken;
            $policy_detail->acco_duration = $request->acco_duration;
            $policy_detail->corpo_deals = $request->corpo_deals;
            $policy_detail->contract_deal = $request->contract_deal;
            $policy_detail->policy_terms = $request->policy_terms;
            $policy_detail->type = $request->type;
            $policy_detail->created_by = Auth::user()->id;


            if ($policy_detail->save()) {

                $polic_id = $policy_detail->id;
                for ($i = 0; $i < $cnt; $i++) {
                    $payment_detail = new PaymentAccept;
                    $payment_detail->policy_id = $polic_id;
                    $payment_detail->payment_mode_id = $request->payment_type[$i];
                    $payment_detail->save();
                }

                for ($j = 0; $j < $item_cnt; $j++) {
                    $offer_detail = new OfferDetail;

                    $offer_detail->accom_venu_promos_id = $acco_id;
                    $offer_detail->name = $request->item[$j];
                    $offer_detail->price = $request->extra_price[$j];
                    $offer_detail->condition = $request->extra_cond[$j];
                    $offer_detail->offer_image = $request->extra_img[$j];
                    $offer_detail->created_by = Auth::user()->id;

                    if ($offer_detail->save()) {
                        

                        /* offer multiple image upload */
                        $extra_files = "";
                        if ($request->file('extra_img')) {
                            if (isset($request->file('extra_img')[$j]) && !empty($request->file('extra_img')[$j])) {

                                $extra_files = $request->file('extra_img')[$j];
                            }

                            $extra_uploadcount = 0;
                            $extra_rules = array('extra_img' => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                            $extra_validator = Validator::make(array('extra_img' => $extra_files), $extra_rules);
                            if ($extra_validator->passes()) {

                                $extra_filename = $offer_detail->id . '_' . $extra_files->getClientOriginalName();
                                

                                // make thumb nail of image
                                $extra_destinationThumb = 'extra_images/thumbnail';
                                if (!file_exists($extra_destinationThumb)) {
                                    mkdir($extra_destinationThumb, 0777, true);
                                }
                                // image reszie
                                $extra_destinationResize = 'extra_images/resize';
                                if (!file_exists($extra_destinationResize)) {
                                    mkdir($extra_destinationResize, 0777, true);
                                }

                                $extra_img = Image::make($extra_files->getRealPath());

                                $extra_img->resize(80, 80, function ($extra_constraint) {
                                    $extra_constraint->aspectRatio();
                                })->save($extra_destinationThumb . '/' . $extra_filename);

                                $extra_img = Image::make($extra_files->getRealPath());
                                $extra_img->resize(300, 300, function ($extra_constraint) {
                                    $extra_constraint->aspectRatio();
                                })->save($extra_destinationResize . '/' . $extra_filename);

                                $extra_destinationPath = 'extra_images';
                                $extra_files->move($extra_destinationPath, $extra_filename);

                                $extra_uploadcount ++;
                            }
                        }

                        $flag = 'success';
                        $msg = "Record Added Successfully";
                    }
                }
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
