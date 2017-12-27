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
use App\Model\MetaTag\MetaTagDetail;
use App\Model\VideoMap\VideoMapDetail;
use App\Http\Requests\Partner\AccommodationRequest;
use App\Http\Requests\Partner\ActivityDetailRequest;
use App\Http\Requests\Partner\RoomDetailRequest;
use App\Http\Requests\Partner\PolicyDetailRequest;
use App\Http\Requests\Partner\MetaDescriptionRequest;
use App\Http\Requests\Partner\VideoMapRequest;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;
use App\Helpers\Helper;

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

            $datas = AccomVenuPromo::getAccommodationList();
            $user = Auth::guard('admin')->user();
            return view('partner.accommodation.index')->with(compact('user', 'datas'));
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

                $arr_accom_img = array(
                    'folder' => 'accom_venu_promo_images',
                    'img_name' => 'accomm_images',
                    'id' => $accommodation->id,
                    'time' => time()
                );

                Helper::UploadImage($request, $arr_accom_img);

                $files = $request->file('accomm_images');
                if (isset($files) && !empty($files) && count($files) > 0) {
                    foreach ($files as $k => $file) {

                        $filename = $arr_accom_img['id'] . '_' . $arr_accom_img['time'] . '_' . $file->getClientOriginalName();

                        /* add image name in database */
                        $image = new AccomVenuPromosImage;
                        $image->accom_venu_promos_id = $accommodation->id;
                        $image->image_name = $filename;

                        if ($accommodation->id == '' && $k == 0) {
                            $image->status = 1;
                        }
                        $image->save();
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
            } else {
                $acco_id = $request->accommo_id;
            }

            $cnt = count($request->room_type);
            $venu_cnt = count($request->venue_name);
            $confer_cnt = count($request->confer_name);

            /////////////Update Record for Room Section/////////////////
            if ($request->room_update) {


                for ($i = 0; $i < $cnt; $i++) {

                    if (!empty($request->room_id[$i]) && isset($request->room_id[$i])) {

                        $room_detail = RoomDetail::find($request->room_id[$i]);
                        $room_img = (isset($room_detail) && !empty($room_detail) ? $room_detail->room_image : '');
                        $room_detail->room_type_id = $request->room_type[$i];
                        $room_detail->guest = $request->guest[$i];
                        $room_detail->available = $request->room_avail[$i];
                        $room_detail->price = $request->room_price[$i];
                        $room_detail->desc = $request->room_desc;
                        $room_detail->short_desc = $request->room_short_desc[$i];
                        $room_detail->room_image = ( isset($request->room_img[$i]) && !empty($request->room_img[$i]) ? $request->room_img[$i]->getClientOriginalName() : $room_detail->room_image);
                        $room_detail->type = $request->type;
                        $room_detail->venu_conf_cond = $request->ven_con_cond;
                        $room_detail->created_by = Auth::user()->id;
                        $room_detail->save();

                        if (isset($request->room_img[$i]) && !empty($request->room_img[$i])) {

                            $imgArr = [];
                            $imgArr['path'] = 'room_images/';
                            $imgArr['pathT'] = 'room_images/thumbnail/';
                            $imgArr['pathR'] = 'room_images/resize/';
                            $imgArr['id'] = $room_detail->id;
                            $imgArr['image_name'] = $room_img;

                            if ($room_img != "") {

                                Helper::unLinkImage($imgArr);
                            }

                            $arr_room_img = array(
                                'folder' => 'room_images',
                                'img_name' => 'room_img',
                                'id' => $room_detail->id,
                            );

                            Helper::UploadImage($request, $arr_room_img, $i);
                        }
                        $flg = '1';
                    } else {

                        $room_detail = new RoomDetail;
                        $room_detail->accom_venu_promos_id = $acco_id;
                        $room_detail->room_type_id = $request->room_type[$i];
                        $room_detail->guest = $request->guest[$i];
                        $room_detail->available = $request->room_avail[$i];
                        $room_detail->price = $request->room_price[$i];
                        $room_detail->desc = $request->room_desc;
                        $room_detail->short_desc = $request->room_short_desc[$i];
                        $room_detail->room_image = ( isset($request->room_img[$i]) && !empty($request->room_img[$i]) ? $request->room_img[$i]->getClientOriginalName() : '');
                        $room_detail->type = $request->type;
                        $room_detail->venu_conf_cond = $request->ven_con_cond;
                        $room_detail->created_by = Auth::user()->id;
                        if ($room_detail->save()) {

                            if (isset($request->room_img[$i]) && !empty($request->room_img[$i])) {

                                $arr_room_img = array(
                                    'folder' => 'room_images',
                                    'img_name' => 'room_img',
                                    'id' => $room_detail->id,
                                );

                                Helper::UploadImage($request, $arr_room_img, $i);
                            }
                            $flg = '1';
                        }
                    }
                }


                ////////////////////updating venu detail////////////////////////////////
                if ($venu_cnt > 0) {

                    for ($j = 0; $j < $venu_cnt; $j++) {

                        if (!empty($request->venue_id[$j]) && isset($request->venue_id[$j])) {

                            $venu_detail = VenuDetail::find($request->venue_id[$j]);
                            $venu_img = (isset($venu_detail) && !empty($venu_detail) ? $venu_detail->venu_image : '');

                            $venu_detail->name = $request->venue_name[$j];
                            $venu_detail->capacity = $request->venue_capacity[$j];
                            $venu_detail->price = $request->venue_price[$j];
                            $venu_detail->desc = $request->venue_desc;
                            $venu_detail->short_desc = $request->venue_short_descr[$j];
                            $venu_detail->venu_image = ( isset($request->venu_img[$j]) && !empty($request->venu_img[$j]) ? $request->venu_img[$j]->getClientOriginalName() : $venu_img);
                            $venu_detail->type = $request->type;
                            $venu_detail->updated_by = Auth::user()->id;
                            $venu_detail->save();

                            if (isset($request->venu_img[$j]) && !empty($request->venu_img[$j])) {

                                $venuImgArr = [];
                                $venuImgArr['path'] = 'venue_images/';
                                $venuImgArr['pathT'] = 'venue_images/thumbnail/';
                                $venuImgArr['pathR'] = 'venue_images/resize/';
                                $venuImgArr['id'] = $venu_detail->id;
                                $venuImgArr['image_name'] = $venu_img;

                                if ($venu_img != "") {

                                    Helper::unLinkImage($venuImgArr);
                                }

                                $arr_venu_img = array(
                                    'folder' => 'venue_images',
                                    'img_name' => 'venu_img',
                                    'id' => $venu_detail->id,
                                );

                                Helper::UploadImage($request, $arr_venu_img, $j);
                            }
                            $flg = '1';
                        } else {

                            $venu_detail = new VenuDetail();
                            $venu_detail->accom_venu_promos_id = $acco_id;
                            $venu_detail->name = $request->venue_name[$j];
                            $venu_detail->capacity = $request->venue_capacity[$j];
                            $venu_detail->price = $request->venue_price[$j];
                            $venu_detail->desc = $request->venue_desc;
                            $venu_detail->short_desc = $request->venue_short_descr[$j];
                            $venu_detail->venu_image = ( isset($request->venu_img[$j]) && !empty($request->venu_img[$j]) ? $request->venu_img[$j]->getClientOriginalName() : '');
                            $venu_detail->type = $request->type;
                            $venu_detail->updated_by = Auth::user()->id;

                            if ($venu_detail->save()) {

                                if (isset($request->venu_img[$j]) && !empty($request->venu_img[$j])) {

                                    $arr_venu_img = array(
                                        'folder' => 'venue_images',
                                        'img_name' => 'venu_img',
                                        'id' => $venu_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_venu_img, $j);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                ////////////////////updating Conference detail////////////////////////////////
                if ($venu_cnt > 0) {
                    for ($k = 0; $k < $confer_cnt; $k++) {

                        if (!empty($request->confer_id[$k]) && isset($request->confer_id[$k])) {

                            $confer_detail = ConferenceDetail::find($request->confer_id[$k]);
                            $confer_img = (isset($confer_detail) && !empty($confer_detail) ? $confer_detail->confer_image : '');

                            $confer_detail->name = $request->confer_name[$k];
                            $confer_detail->capacity = $request->confer_avail[$k];
                            $confer_detail->price = $request->confer_price[$k];
                            $confer_detail->desc = $request->confer_desc;
                            $confer_detail->short_desc = $request->confer_short_descr[$k];
                            $confer_detail->confer_image = ( isset($request->confer_img[$k]) && !empty($request->confer_img[$k]) ? $request->confer_img[$k]->getClientOriginalName() : $confer_img);
                            $confer_detail->type = $request->type;
                            $confer_detail->updated_by = Auth::user()->id;
                            $confer_detail->save();

                            if (isset($request->confer_img[$k]) && !empty($request->confer_img[$k])) {

                                $conferImgArr = [];
                                $conferImgArr['path'] = 'confer_images/';
                                $conferImgArr['pathT'] = 'confer_images/thumbnail/';
                                $conferImgArr['pathR'] = 'confer_images/resize/';
                                $conferImgArr['id'] = $confer_detail->id;
                                $conferImgArr['image_name'] = $confer_img;

                                if ($confer_img != "") {

                                    Helper::unLinkImage($conferImgArr);
                                }

                                $arr_confer_img = array(
                                    'folder' => 'confer_images',
                                    'img_name' => 'confer_img',
                                    'id' => $confer_detail->id,
                                );

                                Helper::UploadImage($request, $arr_confer_img, $k);
                            }
                            $flg = '1';
                        } else {

                            $confer_detail = new ConferenceDetail();
                            $confer_detail->accom_venu_promos_id = $acco_id;
                            $confer_detail->name = $request->confer_name[$k];
                            $confer_detail->capacity = $request->confer_avail[$k];
                            $confer_detail->price = $request->confer_price[$k];
                            $confer_detail->desc = $request->confer_desc;
                            $confer_detail->short_desc = $request->confer_short_descr[$k];
                            $confer_detail->confer_image = ( isset($request->confer_img[$k]) && !empty($request->confer_img[$k]) ? $request->confer_img[$k]->getClientOriginalName() : '');
                            $confer_detail->type = $request->type;
                            $confer_detail->updated_by = Auth::user()->id;

                            if ($confer_detail->save()) {

                                if (isset($request->confer_img[$k]) && !empty($request->confer_img[$k])) {

                                    $arr_confer_img = array(
                                        'folder' => 'confer_images',
                                        'img_name' => 'confer_img',
                                        'id' => $confer_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_confer_img, $k);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                if ($flg) {
                    $flag = 'success';
                    $msg = "Record Updated Successfully";
                } else {
                    $flag = 'danger';
                    $msg = "Record Not Updated Successfully";
                }

                $request->session()->flash($flag, $msg);
                return redirect(route('accomodation.index'));
            } else {

                /////////////Insert Record for Room Section/////////////////

                for ($i = 0; $i < $cnt; $i++) {

                    $room_detail = new RoomDetail;
                    $room_detail->accom_venu_promos_id = $acco_id;
                    $room_detail->room_type_id = $request->room_type[$i];
                    $room_detail->guest = $request->guest[$i];
                    $room_detail->available = $request->room_avail[$i];
                    $room_detail->price = $request->room_price[$i];
                    $room_detail->desc = $request->room_desc;
                    $room_detail->short_desc = $request->room_short_desc[$i];
                    $room_detail->room_image = ( isset($request->room_img[$i]) && !empty($request->room_img[$i]) ? $request->room_img[$i]->getClientOriginalName() : '');
                    $room_detail->type = $request->type;
                    $room_detail->venu_conf_cond = $request->ven_con_cond;
                    $room_detail->created_by = Auth::user()->id;

                    if ($room_detail->save()) {

                        $arr_room_img = array(
                            'folder' => 'room_images',
                            'img_name' => 'room_img',
                            'id' => $room_detail->id,
                        );

                        if (isset($request->room_img[$i]) && !empty($request->room_img[$i])) {
                            Helper::UploadImage($request, $arr_room_img, $i);
                        }

                        $flg = '1';
                    }
                }


                if ($venu_cnt > 0) {
                    for ($j = 0; $j < $venu_cnt; $j++) {

                        $venu_detail = new VenuDetail;
                        $venu_detail->accom_venu_promos_id = $acco_id;
                        $venu_detail->desc = $request->venue_desc;
                        $venu_detail->name = $request->venue_name[$j];
                        $venu_detail->capacity = $request->venue_capacity[$j];
                        $venu_detail->price = $request->venue_price[$j];
                        $venu_detail->short_desc = $request->venue_short_descr[$j];
                        $venu_detail->venu_image = ( isset($request->venue_img[$j]) && !empty($request->venue_img[$j]) ? $request->venue_img[$j]->getClientOriginalName() : '');
                        $venu_detail->type = $request->type;
                        $venu_detail->created_by = Auth::user()->id;

                        if ($venu_detail->save()) {

                            $arr_venue_img = array(
                                'folder' => 'venue_images',
                                'img_name' => 'venue_img',
                                'id' => $venu_detail->id,
                            );

                            if (isset($request->venue_img[$j]) && !empty($request->venue_img[$j])) {
                                Helper::UploadImage($request, $arr_venue_img, $j);
                            }
                            $flg = '1';
                        }
                    }
                }

                if ($confer_cnt > 0) {
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

                            $arr_confer_img = array(
                                'folder' => 'confer_images',
                                'img_name' => 'confer_img',
                                'id' => $confer_detail->id,
                            );

                            if (isset($request->confer_img[$k]) && !empty($request->confer_img[$k])) {
                                Helper::UploadImage($request, $arr_confer_img, $k);
                            }
                            $flg = '1';
                        }
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
            }
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
            } else {
                $acco_id = $request->accommo_id;
            }

            $cnt = count($request->amenity_property);
            $activity_cnt = count($request->activity_property);
            $attarc_cnt = count($request->attraction_name);


            ///////////////update here activity and amenity detail//////////

            if ($request->activity) {

                $delAmniety = AmenityDetail::deleteAmenity($acco_id);
                $delActivity = ActivityDetail::deleteActivity($acco_id);

                for ($i = 0; $i < $cnt; $i++) {
                    $amenity_detail = new AmenityDetail;
                    $amenity_detail->accom_venu_promos_id = $acco_id;
                    $amenity_detail->desc = $request->amenity_desc;
                    $amenity_detail->amenity_id = $request->amenity_property[$i];
                    $amenity_detail->type = $request->type;
                    $amenity_detail->created_by = Auth::user()->id;
                    $amenity_detail->save();
                }


                if ($activity_cnt > 0) {
                    for ($j = 0; $j < $activity_cnt; $j++) {
                        $activity_detail = new ActivityDetail;
                        $activity_detail->accom_venu_promos_id = $acco_id;
                        $activity_detail->desc = $request->activity_desc;
                        $activity_detail->activity_id = $request->activity_property[$j];
                        $activity_detail->type = $request->type;
                        $activity_detail->created_by = Auth::user()->id;
                        $activity_detail->save();
                    }
                }


                if ($attarc_cnt > 0) {
                    for ($k = 0; $k < $attarc_cnt; $k++) {

                        if (!empty($request->suur_id[$k]) && isset($request->suur_id[$k])) {

                            $surr_detail = SurroundingDetail::find($request->suur_id[$k]);
                            $surr_detail->accom_venu_promos_id = $acco_id;
                            $surr_detail->name = $request->attraction_name[$k];
                            $surr_detail->surrounding_id = $request->surrounding[$k];
                            $surr_detail->distance = $request->approx_dist[$k];
                            $surr_detail->shuttle = $request->shuttle;
                            $surr_detail->type = $request->type;
                            $surr_detail->updated_by = Auth::user()->id;
                            $surr_detail->save();
                        } else {

                            $surr_detail = new SurroundingDetail;
                            $surr_detail->accom_venu_promos_id = $acco_id;
                            $surr_detail->name = $request->attraction_name[$k];
                            $surr_detail->surrounding_id = $request->surrounding[$k];
                            $surr_detail->distance = $request->approx_dist[$k];
                            $surr_detail->shuttle = $request->shuttle;
                            $surr_detail->type = $request->type;
                            $surr_detail->updated_by = Auth::user()->id;
                            $surr_detail->save();
                        }
                    }
                }

                $flag = 'success';
                $msg = 'Record Updated Successfully';
                $request->session()->flash($flag, $msg);
                return redirect(route('accomodation.index'));
            } else {

                ///////////////insert here activity and amenity detail//////////
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
            }
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
            } else {
                $acco_id = $request->accommo_id;
            }

            $cnt = count($request->payment_type);
            $item_cnt = count($request->item);

            /////////update policy detail///////////////////
            if ($request->policy) {

                if ($request->policy_id) {
                    $policy_detail = PoliciyDetail::find($request->policy_id);
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
                    $policy_detail->updated_by = Auth::user()->id;
                    $policy_detail->save();

                    ///////////Deleting payment then insert again//////////////
                    $delActivity = PaymentAccept::deletePaymentAccept($request->policy_id);

                    for ($i = 0; $i < $cnt; $i++) {
                        $payment_detail = new PaymentAccept;
                        $payment_detail->policy_id = $request->policy_id;
                        $payment_detail->payment_mode_id = $request->payment_type[$i];
                        $payment_detail->save();
                    }

                    ////////////////////updating Offer detail////////////////////////////////
                    for ($j = 0; $j < $item_cnt; $j++) {

                        if (!empty($request->offer_id[$j]) && isset($request->offer_id[$j])) {

                            $offer_detail = OfferDetail::find($request->offer_id[$j]);
                            $offer_img = (isset($offer_detail) && !empty($offer_detail) ? $offer_detail->offer_image : '');

                            $offer_detail->accom_venu_promos_id = $acco_id;
                            $offer_detail->name = $request->item[$j];
                            $offer_detail->price = $request->extra_price[$j];
                            $offer_detail->condition = $request->extra_cond[$j];
                            $offer_detail->offer_image = ( isset($request->extra_img[$j]) && !empty($request->extra_img[$j]) ? $request->extra_img[$j]->getClientOriginalName() : $offer_img);
                            ;
                            $offer_detail->updated_by = Auth::user()->id;
                            $offer_detail->save();

                            if (isset($request->extra_img[$j]) && !empty($request->extra_img[$j])) {

                                $offerImgArr['path'] = 'extra_images/';
                                $offerImgArr['pathT'] = 'extra_images/thumbnail/';
                                $offerImgArr['pathR'] = 'extra_images/resize/';
                                $offerImgArr['id'] = $offer_detail->id;
                                $offerImgArr['image_name'] = $offer_img;

                                if ($offer_img != "") {

                                    Helper::unLinkImage($offerImgArr);
                                }

                                $arr_offer_img = array(
                                    'folder' => 'extra_images',
                                    'img_name' => 'extra_img',
                                    'id' => $offer_detail->id,
                                );

                                Helper::UploadImage($request, $arr_offer_img, $j);
                            }
                            $flg = '1';
                        } else {

                            $offer_detail = new OfferDetail();
                            $offer_detail->accom_venu_promos_id = $acco_id;
                            $offer_detail->name = $request->item[$j];
                            $offer_detail->price = $request->extra_price[$j];
                            $offer_detail->condition = $request->extra_cond[$j];
                            $offer_detail->offer_image = ( isset($request->extra_img[$j]) && !empty($request->extra_img[$j]) ? $request->extra_img[$j]->getClientOriginalName() : '');
                            ;
                            $offer_detail->updated_by = Auth::user()->id;
                            $offer_detail->save();

                            if ($offer_detail->save()) {

                                if (isset($request->extra_img[$j]) && !empty($request->extra_img[$j])) {

                                    $arr_offer_img = array(
                                        'folder' => 'extra_images',
                                        'img_name' => 'extra_img',
                                        'id' => $offer_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_offer_img, $j);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                $flag = 'success';
                $msg = 'Record Updated Successfully';
                $request->session()->flash($flag, $msg);
                return redirect(route('accomodation.index'));
            } else {

                /////////Inser policy detail///////////////////
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
                        $offer_detail->offer_image = ( isset($request->extra_img[$j]) && !empty($request->extra_img[$j]) ? $request->extra_img[$j]->getClientOriginalName() : '');
                        ;
                        $offer_detail->created_by = Auth::user()->id;

                        if ($offer_detail->save()) {

                            $arr_offer_img = array(
                                'folder' => 'extra_images',
                                'img_name' => 'extra_img',
                                'id' => $offer_detail->id,
                            );

                            if (isset($request->extra_img[$j]) && !empty($request->extra_img[$j])) {
                                Helper::UploadImage($request, $arr_offer_img, $j);
                            }

                            $flag = 'success';
                            $msg = "Record Added Successfully";
                        }
                    }
                }

                $request->session()->flash($flag, $msg);
                $request->session()->put('tab_type', 5);
                return redirect(route('accomodation.create'));
            }
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
    public function metaDescription(MetaDescriptionRequest $request) {

        try {

            $acco_id = '';

            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            } else {
                $acco_id = $request->accommo_id;
            }

            if ($request->meta_tag) {

                if (isset($request->meta_id) && !empty($request->meta_id)) {

                    $meta_detail = MetaTagDetail::find($request->meta_id);

                    $meta_detail->accom_venu_promos_id = $acco_id;
                    $meta_detail->title = $request->title;
                    $meta_detail->keyword = $request->keyword;
                    $meta_detail->meta_desc = $request->meta_desc;
                    $meta_detail->type = $request->type;
                    $meta_detail->created_by = Auth::user()->id;

                    if ($meta_detail->save()) {
                        $flag = 'success';
                        $msg = "Record Updated Successfully";
                    } else {
                        $flag = 'danger';
                        $msg = "Record Not Updated Successfully";
                    }

                    $request->session()->flash($flag, $msg);
                    return redirect(route('accomodation.index'));
                }
            } else {
                $meta_detail = new MetaTagDetail;

                $meta_detail->accom_venu_promos_id = $acco_id;
                $meta_detail->title = $request->title;
                $meta_detail->keyword = $request->keyword;
                $meta_detail->meta_desc = $request->meta_desc;
                $meta_detail->type = $request->type;
                $meta_detail->created_by = Auth::user()->id;

                if ($meta_detail->save()) {
                    $flag = 'success';
                    $msg = "Record Added Successfully";
                } else {
                    $flag = 'danger';
                    $msg = "Record Not Added Successfully";
                }

                $request->session()->flash($flag, $msg);
                $request->session()->put('tab_type', 6);
                return redirect(route('accomodation.create'));
            }
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
    public function videoMapDetail(VideoMapRequest $request) {

        try {

            $acco_id = '';

            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            } else {
                $acco_id = $request->accommo_id;
            }

            if ($request->video_map) {

                if ($request->video_id) {

                    $video_detail = VideoMapDetail::find($request->video_id);

                    $video_detail->accom_venu_promos_id = $acco_id;
                    $video_detail->video_link = $request->video_link;
                    $video_detail->lat = $request->lat;
                    $video_detail->long = $request->long;
                    $video_detail->type = $request->type;
                    $video_detail->is_link = $request->video_cond;
                    $video_detail->created_by = Auth::user()->id;
                    if ($video_detail->save()) {
                        $flag = 'success';
                        $msg = "Record Updated Successfully";
                    } else {
                        $flag = 'danger';
                        $msg = "Record Not Updated Successfully";
                    }

                    $request->session()->flash($flag, $msg);
                    return redirect(route('accomodation.index'));
                }
            } else {



                $video_detail = new VideoMapDetail;

                $video_detail->accom_venu_promos_id = $acco_id;
                $video_detail->video_link = $request->video_link;
                $video_detail->lat = $request->lat;
                $video_detail->long = $request->long;
                $video_detail->type = $request->type;
                $video_detail->is_link = $request->video_cond;
                $video_detail->created_by = Auth::user()->id;
                if ($video_detail->save()) {
                    $flag = 'success';
                    $msg = "Record Added Successfully";
                } else {
                    $flag = 'danger';
                    $msg = "Record Not Added Successfully";
                }

                $request->session()->flash($flag, $msg);
                $request->session()->forget('tab_type');
                $request->session()->forget('accom_id');
                return redirect(route('accomodation.index'));
            }
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

        try {
            $user = Auth::guard('admin')->user();
            $accomm_data = new AccommodationList;
            $room_data = new RoomList;
            $surr_data = new SurroundingList;
            $country = new Country;
            $amenity = new AmenityList;
            $activity = new ActivityList;
            $payment_list = new PaymentModeList;
            $arr_accommo_detail = AccomVenuPromo::getAccommodationById($id);
            $arr_room_detail = RoomDetail::getRoomById($id);
            $arr_venu_detail = VenuDetail::getVenuById($id);
            $arr_confer_detail = ConferenceDetail::getConferById($id);
            $arr_activity_detail = ActivityDetail::getActivityById($id);
            $arr_amenity_detail = AmenityDetail::getAmenityById($id);
            $arr_surr_detail = SurroundingDetail::getSurrById($id);
            $arr_policy_detail = PoliciyDetail::getPolicyById($id);
            $arr_offer_detail = OfferDetail::getOfferById($id);
            $arr_meta_detail = MetaTagDetail::getMegaDetailById($id);
            $arr_video_detail = VideoMapDetail::getVideoMapById($id);
            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_room = $room_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_surr = $surr_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_amenity = $amenity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_activity = $activity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_payment = $payment_list->select('id', 'name')->orderBy('id', 'ASC')->get();

            return view('partner.accommodation.edit')->with(compact('user', 'arr_accommo_detail', 'arr_room_detail', 'arr_venu_detail', 'arr_confer_detail', 'arr_activity_detail', 'arr_amenity_detail', 'arr_surr_detail', 'arr_policy_detail', 'arr_offer_detail', 'arr_meta_detail', 'arr_video_detail', 'arr_accomm', 'arr_country', 'arr_room', 'arr_surr', 'arr_amenity', 'arr_activity', 'arr_payment'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccommodationRequest $request, $id) {

        $accommodation = AccomVenuPromo::find($id);
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

        $arr_accom_img = array(
            'folder' => 'accom_venu_promo_images',
            'img_name' => 'accomm_images',
            'id' => $accommodation->id,
            'time' => time()
        );

        Helper::UploadImage($request, $arr_accom_img);

        $files = $request->file('accomm_images');
        if (isset($files) && !empty($files) && count($files) > 0) {
            foreach ($files as $k => $file) {

                $filename = $arr_accom_img['id'] . '_' . $arr_accom_img['time'] . '_' . $file->getClientOriginalName();

                /* add image name in database */
                $image = new AccomVenuPromosImage;
                $image->accom_venu_promos_id = $accommodation->id;
                $image->image_name = $filename;

                if ($accommodation->id == '' && $k == 0) {
                    $image->status = 1;
                }
                $image->save();
            }
        }

        $this->setActiveThumb($id, $request->get("active_thumb", 0));

        if ($accommodation->save()) {
            $flag = 'success';
            $msg = "Record Updated Successfully";
        } else {
            $flag = 'danger';
            $msg = "Record Not Updated Successfully";
        }
        $request->session()->flash($flag, $msg);
        return redirect(route('accomodation.index'));
    }

    /**
     * setActiveThumb
     * @param
     * @return array
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function setActiveThumb($pID, $active) {

        if (!empty($active)) {
            /* set all 0 first */
            $arrProductImage1 = [];
            $arrProductImage1['active_thumb'] = '0';
            AccomVenuPromosImage::updateDataByProduct($arrProductImage1, $pID);

            /* set active thumb now */
            $arrProductImage = [];
            $arrProductImage['active_thumb'] = '1';
            AccomVenuPromosImage::updateDataByImage($arrProductImage, $active);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {

        if (isset($id) && !empty($id)) {

            $getAllImages = AccomVenuPromosImage::getImagesById($id);
            $getRoomImages = RoomDetail::getRoomById($id);
            $getVenuImages = VenuDetail::getVenuById($id);
            $getConferImages = ConferenceDetail::getConferById($id);
            $getOfferImages = OfferDetail::getOfferById($id);

            if (isset($getAllImages) && !empty($getAllImages) && count($getAllImages) > 0) {

                foreach ($getAllImages as $images) {
                    $accommoImgArr = [];

                    $accommoImgArr['path'] = 'accom_venu_promo_images/';
                    $accommoImgArr['pathT'] = 'accom_venu_promo_images/thumbnail/';
                    $accommoImgArr['pathR'] = 'accom_venu_promo_images/resize/';
                    $accommoImgArr['id'] = '';
                    $accommoImgArr['image_name'] = $images->image_name;

                    if ($images->image_name != '') {

                        Helper::unLinkImage($accommoImgArr);
                    }
                }
            }

            if (isset($getRoomImages) && !empty($getRoomImages) && count($getRoomImages) > 0) {

                foreach ($getRoomImages as $room) {

                    $roomImgArr = [];
                    $roomImgArr['path'] = 'room_images/';
                    $roomImgArr['pathT'] = 'room_images/thumbnail/';
                    $roomImgArr['pathR'] = 'room_images/resize/';
                    $roomImgArr['id'] = $room->id;
                    $roomImgArr['image_name'] = $room->room_image;

                    if ($room->room_image != '') {

                        Helper::unLinkImage($roomImgArr);
                    }
                }
            }

            if (isset($getVenuImages) && !empty($getVenuImages) && count($getVenuImages) > 0) {

                foreach ($getVenuImages as $venu) {


                    $venuImgArr = [];
                    $venuImgArr['path'] = 'venue_images/';
                    $venuImgArr['pathT'] = 'venue_images/thumbnail/';
                    $venuImgArr['pathR'] = 'venue_images/resize/';
                    $venuImgArr['id'] = $venu->id;
                    $venuImgArr['image_name'] = $venu->venu_image;

                    if ($venu->venu_image != '') {

                        Helper::unLinkImage($venuImgArr);
                    }
                }
            }


            if (isset($getConferImages) && !empty($getConferImages) && count($getConferImages) > 0) {

                foreach ($getConferImages as $confer) {

                    $conferImgArr = [];
                    $conferImgArr['path'] = 'confer_images/';
                    $conferImgArr['pathT'] = 'confer_images/thumbnail/';
                    $conferImgArr['pathR'] = 'confer_images/resize/';
                    $conferImgArr['id'] = $confer->id;
                    $conferImgArr['image_name'] = $confer->confer_image;

                    if ($confer->confer_image != '') {

                        Helper::unLinkImage($conferImgArr);
                    }
                }
            }

            if (isset($getOfferImages) && !empty($getOfferImages) && count($getOfferImages) > 0) {

                foreach ($getOfferImages as $offer) {

                    $offerImgArr = [];
                    $offerImgArr['path'] = 'extra_images/';
                    $offerImgArr['pathT'] = 'extra_images/thumbnail/';
                    $offerImgArr['pathR'] = 'extra_images/resize/';
                    $offerImgArr['id'] = $offer->id;
                    $offerImgArr['image_name'] = $offer->offer_image;

                    if ($offer->offer_image != '') {

                        Helper::unLinkImage($offerImgArr);
                    }
                }
            }

            $record = AccomVenuPromo::find($id);
            if ($record->delete()) {
                $flag = 'success';
                $msg = 'Record Deleted Successfully';
            } else {
                $flag = 'danger';
                $msg = 'Record Not Deleted Successfully';
            }
            $request->session()->flash($flag, $msg);
            return redirect()->back();
        }
    }

}
