<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Accommodation\AccomVenuPromo;
use App\Model\Accommodation\AccommodationList;
use App\Model\Accommodation\AccomVenuPromosImage;
use App\Model\RoomList\RoomList;
use App\Model\SurroundingList\SurroundingList;
use App\Http\Requests\Partner\AccommodationRequest;
use Illuminate\Support\Facades\Validator;
use App\Model\State\State;
use App\Model\Country\Country;
use App\Model\City\City;
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

            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'DESC')->where('status', 1)->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_room = $room_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_surr = $surr_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            
            return view('partner.accommodation.create')->with(compact('user', 'arr_accomm', 'arr_country', 'arr_room', 'arr_surr'));
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
            $accommodation->tab_type = 1;
            $accommodation->type = 1;

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
            $request->session()->put('tab_type', $accommodation->tab_type);
            
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
