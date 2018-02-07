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
use App\Model\Health\HealthDetail;
use App\Model\Transport\TransportDetail;
use App\Model\AmenityList\AmenityList;
use App\Model\AmenityList\AmenityDetail;
use App\Model\ActivityList\ActivityList;
use App\Model\ActivityList\ActivityDetail;
use App\Model\SurroundingList\SurroundingList;
use App\Model\SurroundingList\SurroundingDetail;
use App\Model\PaymentModeList\PaymentModeList;
use App\Model\PaymentModeList\PaymentAccept;
use App\Model\Policy\PoliciyDetail;
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
use Illuminate\Support\Facades\Input;

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
            $this->middleware('proofupload');
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
            $datas = AccomVenuPromo::getAccommodationList('A');
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

            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('name', 'ASC')->where('status', 1)->get();
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

                $flg = 1;
            } else {
                $flg = 1;
            }

            if ($flg) {
                $request->session()->put('tab_type', 2);
                $request->session()->put('accom_id', $accommodation->id);
                $flag = 'success';
                $msg = "Record Saved Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Saved Successfully";
            }


            $request->session()->flash($flag, $msg);
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
            $flg = '';
            if (!empty(session()->get('accom_id'))) {
                $acco_id = session()->get('accom_id');
            } else {
                $acco_id = $request->accommo_id;
            }

            /////////////Update Record for Room Section/////////////////
            if ($request->room_update) {

                /////////////Update Record for Room /////////////////
                if (is_array($request->room_name) && !empty($request->room_name)) {

                    foreach ($request->room_name as $key => $val) {

                        $from_date = \Carbon\Carbon::parse($request->room_from_date[$key])->format('Y-m-d h:i:s');
                        $to_date = \Carbon\Carbon::parse($request->room_to_date[$key])->format('Y-m-d h:i:s');

                        if (!empty($request->room_id[$key]) && isset($request->room_id[$key])) {

                            $room_detail = RoomDetail::find($request->room_id[$key]);

                            $room_img = (isset($room_detail) && !empty($room_detail) ? $room_detail->room_image : '');
                            $room_detail->room_type_id = $request->room_type[$key];
                            $room_detail->title = $request->room_name[$key];
                            $room_detail->room_type_id = $request->room_type[$key];
                            $room_detail->guest = $request->guest[$key];
                            $room_detail->qty = $request->room_qty[$key];
                            $room_detail->price = $request->room_price[$key];
                            $room_detail->promo_price = $request->room_promo_price[$key];
                            $room_detail->desc = $request->accommo_desc;
                            $room_detail->room_desc = $request->room_desc[$key];
                            $room_detail->promo_desc = $request->room_promo_desc[$key];
                            $room_detail->is_promo = $request->is_room_promo[$key];
                            $room_detail->room_image = ( isset($request->room_img[$key]) && !empty($request->room_img[$key]) ? $request->room_img[$key]->getClientOriginalName() : $room_detail->room_image);
                            $room_detail->type = $request->type;
                            $room_detail->is_accommo = $request->is_accommo;
                            $room_detail->created_by = Auth::user()->id;
                            $room_detail->from_date = $from_date;
                            $room_detail->to_date = $to_date;
                            if ($room_detail->save()) {
                                $flg = '1';
                            }

                            if (isset($request->room_img[$key]) && !empty($request->room_img[$key])) {

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

                                Helper::UploadImage($request, $arr_room_img, $key);
                                $flg = '1';
                            }
                        } else {

                            $room_detail = new RoomDetail;
                            $room_detail->accom_venu_promos_id = $acco_id;
                            $room_detail->title = $request->room_name[$key];
                            $room_detail->room_type_id = $request->room_type[$key];
                            $room_detail->guest = $request->guest[$key];
                            $room_detail->qty = $request->room_qty[$key];
                            $room_detail->price = $request->room_price[$key];
                            $room_detail->promo_price = $request->room_promo_price[$key];
                            $room_detail->desc = $request->accommo_desc;
                            $room_detail->room_desc = $request->room_desc[$key];
                            $room_detail->promo_desc = $request->room_promo_desc[$key];
                            $room_detail->is_promo = $request->is_room_promo[$key];
                            $room_detail->room_image = ( isset($request->room_img[$key]) && !empty($request->room_img[$key]) ? $request->room_img[$key]->getClientOriginalName() : '');
                            $room_detail->type = $request->type;
                            $room_detail->is_accommo = $request->is_accommo;
                            $room_detail->created_by = Auth::user()->id;
                            $room_detail->from_date = $from_date;
                            $room_detail->to_date = $to_date;
                            if ($room_detail->save()) {

                                if (isset($request->room_img[$key]) && !empty($request->room_img[$key])) {

                                    $arr_room_img = array(
                                        'folder' => 'room_images',
                                        'img_name' => 'room_img',
                                        'id' => $room_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_room_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                /////////////Update Record for Venu /////////////////
                if (is_array($request->venue_name) && !empty($request->venue_name)) {

                    foreach ($request->venue_name as $key => $val) {

                        $venu_from_date = \Carbon\Carbon::parse($request->venue_from_date[$key])->format('Y-m-d h:i:s');
                        $venu_to_date = \Carbon\Carbon::parse($request->venue_to_date[$key])->format('Y-m-d h:i:s');

                        if (!empty($request->venue_id[$key]) && isset($request->venue_id[$key])) {

                            $venu_detail = VenuDetail::find($request->venue_id[$key]);
                            $venu_img = (isset($venu_detail) && !empty($venu_detail) ? $venu_detail->venu_image : '');
                            $venu_detail->desc = $request->venue_desc;
                            $venu_detail->venu_desc = $request->venue_short_descr[$key];
                            $venu_detail->promo_desc = $request->venue_promo_desc[$key];
                            $venu_detail->title = $request->venue_name[$key];
                            $venu_detail->qty = $request->venue_qty[$key];
                            $venu_detail->rental_price = $request->venue_price[$key];
                            $venu_detail->price_per_seat = $request->venue_price_per_seat[$key];
                            $venu_detail->promo_price = $request->venue_promo_price[$key];
                            $venu_detail->is_promo = $request->is_venue_promo[$key];
                            $venu_detail->venu_image = ( isset($request->venu_img[$key]) && !empty($request->venu_img[$key]) ? $request->venu_img[$key]->getClientOriginalName() : $venu_img);
                            $venu_detail->type = $request->type;
                            $venu_detail->is_venu = $request->is_venu;
                            $venu_detail->created_by = Auth::user()->id;
                            $venu_detail->from_date = $venu_from_date;
                            $venu_detail->to_date = $venu_to_date;
                            if ($venu_detail->save()) {
                                $flg = '1';
                            }

                            if (isset($request->venu_img[$key]) && !empty($request->venu_img[$key])) {

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

                                Helper::UploadImage($request, $arr_venu_img, $key);
                                $flg = '1';
                            }
                        } else {

                            $venu_detail = new VenuDetail;
                            $venu_detail->accom_venu_promos_id = $acco_id;
                            $venu_detail->desc = $request->venue_desc;
                            $venu_detail->venu_desc = $request->venue_short_descr[$key];
                            $venu_detail->promo_desc = $request->venue_promo_desc[$key];
                            $venu_detail->title = $request->venue_name[$key];
                            $venu_detail->qty = $request->venue_qty[$key];
                            $venu_detail->rental_price = $request->venue_price[$key];
                            $venu_detail->price_per_seat = $request->venue_price_per_seat[$key];
                            $venu_detail->promo_price = $request->venue_promo_price[$key];
                            $venu_detail->is_promo = $request->is_venue_promo[$key];
                            $venu_detail->venu_image = ( isset($request->venue_img[$key]) && !empty($request->venue_img[$key]) ? $request->venue_img[$key]->getClientOriginalName() : '');
                            $venu_detail->type = $request->type;
                            $venu_detail->is_venu = $request->is_venu;
                            $venu_detail->created_by = Auth::user()->id;
                            $venu_detail->from_date = $venu_from_date;
                            $venu_detail->to_date = $venu_to_date;

                            if ($venu_detail->save()) {

                                if (isset($request->venu_img[$key]) && !empty($request->venu_img[$key])) {

                                    $arr_venu_img = array(
                                        'folder' => 'venue_images',
                                        'img_name' => 'venu_img',
                                        'id' => $venu_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_venu_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                /////////////Update Record for Conference /////////////////
                if (is_array($request->confer_name) && !empty($request->confer_name)) {

                    foreach ($request->confer_name as $key => $val) {

                        $confer_from_date = \Carbon\Carbon::parse($request->confer_from_date[$key])->format('Y-m-d h:i:s');
                        $confer_to_date = \Carbon\Carbon::parse($request->confer_to_date[$key])->format('Y-m-d h:i:s');

                        if (!empty($request->confer_id[$key]) && isset($request->confer_id[$key])) {

                            $confer_detail = ConferenceDetail::find($request->confer_id[$key]);
                            $confer_img = (isset($confer_detail) && !empty($confer_detail) ? $confer_detail->confer_image : '');

                            $confer_detail->desc = $request->confer_desc;
                            $confer_detail->confer_desc = $request->confer_short_descr[$key];
                            $confer_detail->promo_desc = $request->confer_promo_desc[$key];
                            $confer_detail->title = $request->confer_name[$key];
                            $confer_detail->qty = $request->confer_qty[$key];
                            $confer_detail->rental_price = $request->confer_price[$key];
                            $confer_detail->price_per_seat = $request->confer_price_per_seat[$key];
                            $confer_detail->promo_price = $request->confer_promo_price[$key];
                            $confer_detail->is_promo = $request->is_confer_promo[$key];
                            $confer_detail->confer_image = ( isset($request->confer_img[$key]) && !empty($request->confer_img[$key]) ? $request->confer_img[$key]->getClientOriginalName() : $confer_img);
                            $confer_detail->type = $request->type;
                            $confer_detail->is_confer = $request->is_confer;
                            $confer_detail->created_by = Auth::user()->id;
                            $confer_detail->from_date = $confer_from_date;
                            $confer_detail->to_date = $confer_to_date;
                            if ($confer_detail->save()) {
                                $flg = '1';
                            }

                            if (isset($request->confer_img[$key]) && !empty($request->confer_img[$key])) {

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

                                Helper::UploadImage($request, $arr_confer_img, $key);
                                $flg = '1';
                            }
                        } else {

                            $confer_detail = new ConferenceDetail;
                            $confer_detail->accom_venu_promos_id = $acco_id;
                            $confer_detail->desc = $request->confer_desc;
                            $confer_detail->confer_desc = $request->confer_short_descr[$key];
                            $confer_detail->promo_desc = $request->confer_promo_desc[$key];
                            $confer_detail->title = $request->confer_name[$key];
                            $confer_detail->qty = $request->confer_qty[$key];
                            $confer_detail->rental_price = $request->confer_price[$key];
                            $confer_detail->price_per_seat = $request->confer_price_per_seat[$key];
                            $confer_detail->promo_price = $request->confer_promo_price[$key];
                            $confer_detail->is_promo = $request->is_confer_promo[$key];
                            $confer_detail->confer_image = ( isset($request->confer_img[$key]) && !empty($request->confer_img[$key]) ? $request->confer_img[$key]->getClientOriginalName() : '');
                            $confer_detail->type = $request->type;
                            $confer_detail->is_confer = $request->is_confer;
                            $confer_detail->created_by = Auth::user()->id;
                            $confer_detail->from_date = $confer_from_date;
                            $confer_detail->to_date = $confer_to_date;

                            if ($confer_detail->save()) {

                                if (isset($request->confer_img[$key]) && !empty($request->confer_img[$key])) {

                                    $arr_confer_img = array(
                                        'folder' => 'confer_images',
                                        'img_name' => 'confer_img',
                                        'id' => $confer_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_confer_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                /////////////Update Record for Health /////////////////
                if (is_array($request->health_name) && !empty($request->health_name)) {

                    foreach ($request->health_name as $key => $val) {

                        $health_from_date = \Carbon\Carbon::parse($request->health_from_date[$key])->format('Y-m-d h:i:s');
                        $health_to_date = \Carbon\Carbon::parse($request->health_to_date[$key])->format('Y-m-d h:i:s');

                        if (!empty($request->health_id[$key]) && isset($request->health_id[$key])) {

                            $health_detail = HealthDetail::find($request->health_id[$key]);

                            $health_img = (isset($health_detail) && !empty($health_detail) ? $health_detail->health_image : '');
                            $health_detail->desc = $request->health_desc;
                            $health_detail->service_desc = $request->health_short_desc[$key];
                            $health_detail->promo_desc = $request->health_promo_desc[$key];
                            $health_detail->title = $request->health_name[$key];
                            $health_detail->treatment = $request->treatment[$key];
                            $health_detail->price_per_treatment = $request->service_price[$key];
                            $health_detail->promo_price = $request->health_promo_price[$key];
                            $health_detail->is_promo = $request->is_health_promo[$key];
                            $health_detail->health_image = ( isset($request->health_img[$key]) && !empty($request->health_img[$key]) ? $request->health_img[$key]->getClientOriginalName() : $health_img);
                            $health_detail->type = $request->type;
                            $health_detail->is_health = $request->is_health;
                            $health_detail->created_by = Auth::user()->id;
                            $health_detail->from_date = $health_from_date;
                            $health_detail->to_date = $health_to_date;
                            if ($health_detail->save()) {
                                $flg = '1';
                            }

                            if (isset($request->health_img[$key]) && !empty($request->health_img[$key])) {

                                $healthImgArr = [];
                                $healthImgArr['path'] = 'health_images/';
                                $healthImgArr['pathT'] = 'health_images/thumbnail/';
                                $healthImgArr['pathR'] = 'health_images/resize/';
                                $healthImgArr['id'] = $health_detail->id;
                                $healthImgArr['image_name'] = $health_img;

                                if ($health_img != "") {

                                    Helper::unLinkImage($healthImgArr);
                                }

                                $arr_health_img = array(
                                    'folder' => 'health_images',
                                    'img_name' => 'health_img',
                                    'id' => $health_detail->id,
                                );

                                Helper::UploadImage($request, $arr_health_img, $key);
                                $flg = '1';
                            }
                        } else {

                            $health_detail = new HealthDetail;
                            $health_detail->accom_venu_promos_id = $acco_id;
                            $health_detail->desc = $request->health_desc;
                            $health_detail->service_desc = $request->health_short_desc[$key];
                            $health_detail->promo_desc = $request->health_promo_desc[$key];
                            $health_detail->title = $request->health_name[$key];
                            $health_detail->treatment = $request->treatment[$key];
                            $health_detail->price_per_treatment = $request->service_price[$key];
                            $health_detail->promo_price = $request->health_promo_price[$key];
                            $health_detail->is_promo = $request->is_health_promo[$key];
                            $health_detail->health_image = ( isset($request->health_img[$key]) && !empty($request->health_img[$key]) ? $request->health_img[$key]->getClientOriginalName() : '');
                            $health_detail->type = $request->type;
                            $health_detail->is_health = $request->is_health;
                            $health_detail->created_by = Auth::user()->id;
                            $health_detail->from_date = $health_from_date;
                            $health_detail->to_date = $health_to_date;

                            if ($health_detail->save()) {

                                if (isset($request->health_img[$key]) && !empty($request->health_img[$key])) {

                                    $arr_health_img = array(
                                        'folder' => 'health_images',
                                        'img_name' => 'health_img',
                                        'id' => $health_detail->id,
                                    );

                                    Helper::UploadImage($request, $arr_health_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                /////////////Update Record for Transport/////////////////
                if ($request->trans_desc && $request->trans_id) {
                    $trans_detail = TransportDetail::find($request->trans_id);
                    $trans_detail->desc = $request->trans_desc;
                    $trans_detail->type = $request->type;
                    $trans_detail->is_trans = $request->is_trans;
                    $trans_detail->updated_by = Auth::user()->id;
                    if ($trans_detail->save()) {
                        $flg = '1';
                    }
                } else {

                    $trans_detail = new TransportDetail;
                    $trans_detail->accom_venu_promos_id = $acco_id;
                    $trans_detail->desc = $request->trans_desc;
                    $trans_detail->type = $request->type;
                    $trans_detail->is_trans = $request->is_trans;
                    $trans_detail->created_by = Auth::user()->id;
                    if ($trans_detail->save()) {
                        $flg = '1';
                    }
                }

                if ($flg) {


                    if ($request->type == 'P') {
                        $request->session()->forget('tab_type');
                        $flag = 'success';
                        $msg = "Record Updated Successfully";
                        $request->session()->flash($flag, $msg);
                        return redirect(route('accomodation.index'));
                    }

                    $request->session()->put('tab_type', 3);
                    $flag = 'success';
                    $msg = "Record Updated Successfully";
                } else {
                    $request->session()->put('tab_type', 2);
                    $flag = 'danger';
                    $msg = "Record Not Updated Successfully";
                }

                $request->session()->flash($flag, $msg);


                return redirect(route('accomodation.edit', ['id' => $acco_id]));
            } else {

                /////////////Insert Record for Room Section/////////////////
                if (is_array($request->room_name) && !empty($request->room_name)) {

                    foreach ($request->room_name as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $from_date = \Carbon\Carbon::parse($request->room_from_date[$key])->format('Y-m-d h:i:s');
                            $to_date = \Carbon\Carbon::parse($request->room_to_date[$key])->format('Y-m-d h:i:s');

                            $room_detail = new RoomDetail;
                            $room_detail->accom_venu_promos_id = $acco_id;
                            $room_detail->title = $request->room_name[$key];
                            $room_detail->room_type_id = $request->room_type[$key];
                            $room_detail->guest = $request->guest[$key];
                            $room_detail->qty = $request->room_qty[$key];
                            $room_detail->price = $request->room_price[$key];
                            $room_detail->promo_price = $request->room_promo_price[$key];
                            $room_detail->desc = $request->accommo_desc;
                            $room_detail->room_desc = $request->room_desc[$key];
                            $room_detail->promo_desc = $request->room_promo_desc[$key];
                            $room_detail->is_promo = $request->is_room_promo[$key];
                            $room_detail->room_image = ( isset($request->room_img[$key]) && !empty($request->room_img[$key]) ? $request->room_img[$key]->getClientOriginalName() : '');
                            $room_detail->type = $request->type;
                            $room_detail->is_accommo = $request->is_accommo;
                            $room_detail->created_by = Auth::user()->id;
                            $room_detail->from_date = $from_date;
                            $room_detail->to_date = $to_date;

                            if ($room_detail->save()) {

                                $arr_room_img = array(
                                    'folder' => 'room_images',
                                    'img_name' => 'room_img',
                                    'id' => $room_detail->id,
                                );

                                if (isset($request->room_img[$key]) && !empty($request->room_img[$key])) {
                                    Helper::UploadImage($request, $arr_room_img, $key);
                                }

                                $flg = '1';
                            }
                        }
                    }
                }


                /////////////Insert venue Room Section/////////////////
                if (is_array($request->venue_name) && !empty($request->venue_name)) {

                    foreach ($request->venue_name as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $venu_from_date = \Carbon\Carbon::parse($request->venue_from_date[$key])->format('Y-m-d h:i:s');
                            $venu_to_date = \Carbon\Carbon::parse($request->venue_to_date[$key])->format('Y-m-d h:i:s');

                            $venu_detail = new VenuDetail;
                            $venu_detail->accom_venu_promos_id = $acco_id;
                            $venu_detail->desc = $request->venue_desc;
                            $venu_detail->venu_desc = $request->venue_short_descr[$key];
                            $venu_detail->promo_desc = $request->venue_promo_desc[$key];
                            $venu_detail->is_promo = $request->is_venue_promo[$key];
                            $venu_detail->title = $request->venue_name[$key];
                            $venu_detail->qty = $request->venue_qty[$key];
                            $venu_detail->rental_price = $request->venue_price[$key];
                            $venu_detail->price_per_seat = $request->venue_price_per_seat[$key];
                            $venu_detail->promo_price = $request->venue_promo_price[$key];
                            $venu_detail->venu_image = ( isset($request->venue_img[$key]) && !empty($request->venue_img[$key]) ? $request->venue_img[$key]->getClientOriginalName() : '');
                            $venu_detail->type = $request->type;
                            $venu_detail->is_venu = $request->is_venu;
                            $venu_detail->created_by = Auth::user()->id;
                            $venu_detail->from_date = $venu_from_date;
                            $venu_detail->to_date = $venu_to_date;

                            if ($venu_detail->save()) {

                                $arr_venue_img = array(
                                    'folder' => 'venue_images',
                                    'img_name' => 'venue_img',
                                    'id' => $venu_detail->id,
                                );

                                if (isset($request->venue_img[$key]) && !empty($request->venue_img[$key])) {
                                    Helper::UploadImage($request, $arr_venue_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }


                /////////////Insert Conference Room Section/////////////////
                if (is_array($request->confer_name) && !empty($request->confer_name)) {

                    foreach ($request->confer_name as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $confer_from_date = \Carbon\Carbon::parse($request->confer_from_date[$key])->format('Y-m-d h:i:s');
                            $confer_to_date = \Carbon\Carbon::parse($request->confer_to_date[$key])->format('Y-m-d h:i:s');

                            $confer_detail = new ConferenceDetail;
                            $confer_detail->accom_venu_promos_id = $acco_id;
                            $confer_detail->desc = $request->confer_desc;
                            $confer_detail->confer_desc = $request->confer_short_descr[$key];
                            $confer_detail->promo_desc = $request->confer_promo_desc[$key];
                            $confer_detail->is_promo = $request->is_confer_promo[$key];
                            $confer_detail->title = $request->confer_name[$key];
                            $confer_detail->qty = $request->confer_qty[$key];
                            $confer_detail->rental_price = $request->confer_price[$key];
                            $confer_detail->price_per_seat = $request->confer_price_per_seat[$key];
                            $confer_detail->promo_price = $request->confer_promo_price[$key];
                            $confer_detail->confer_image = ( isset($request->confer_img[$key]) && !empty($request->confer_img[$key]) ? $request->confer_img[$key]->getClientOriginalName() : '');
                            $confer_detail->type = $request->type;
                            $confer_detail->is_confer = $request->is_confer[$key];
                            $confer_detail->created_by = Auth::user()->id;
                            $confer_detail->from_date = $confer_from_date;
                            $confer_detail->to_date = $confer_to_date;

                            if ($confer_detail->save()) {

                                $arr_confer_img = array(
                                    'folder' => 'confer_images',
                                    'img_name' => 'confer_img',
                                    'id' => $confer_detail->id,
                                );

                                if (isset($request->confer_img[$key]) && !empty($request->confer_img[$key])) {
                                    Helper::UploadImage($request, $arr_confer_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }


                /////////////Insert health Room Section/////////////////
                if (is_array($request->health_name) && !empty($request->health_name)) {

                    foreach ($request->health_name as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $health_from_date = \Carbon\Carbon::parse($request->health_from_date[$key])->format('Y-m-d h:i:s');
                            $health_to_date = \Carbon\Carbon::parse($request->health_to_date[$key])->format('Y-m-d h:i:s');

                            $health_detail = new HealthDetail;
                            $health_detail->accom_venu_promos_id = $acco_id;
                            $health_detail->desc = $request->health_desc;
                            $health_detail->service_desc = $request->health_short_desc[$key];
                            $health_detail->promo_desc = $request->health_promo_desc[$key];
                            $health_detail->is_promo = $request->is_health_promo[$key];
                            $health_detail->title = $request->health_name[$key];
                            $health_detail->treatment = $request->treatment[$key];
                            $health_detail->price_per_treatment = $request->service_price[$key];
                            $health_detail->promo_price = $request->health_promo_price[$key];
                            $health_detail->health_image = ( isset($request->health_img[$key]) && !empty($request->health_img[$key]) ? $request->health_img[$key]->getClientOriginalName() : '');
                            $health_detail->type = $request->type;
                            $health_detail->is_health = $request->is_health;
                            $health_detail->created_by = Auth::user()->id;
                            $health_detail->from_date = $health_from_date;
                            $health_detail->to_date = $health_to_date;

                            if ($health_detail->save()) {

                                $arr_health_img = array(
                                    'folder' => 'health_images',
                                    'img_name' => 'health_img',
                                    'id' => $health_detail->id,
                                );

                                if (isset($request->health_img[$key]) && !empty($request->health_img[$key])) {
                                    Helper::UploadImage($request, $arr_health_img, $key);
                                }
                                $flg = '1';
                            }
                        }
                    }
                }

                /////////////Insert Transport Room Section/////////////////
                if ($request->trans_desc) {
                    $trans_detail = new TransportDetail;
                    $trans_detail->accom_venu_promos_id = $acco_id;
                    $trans_detail->desc = $request->trans_desc;
                    $trans_detail->type = $request->type;
                    $trans_detail->is_trans = $request->is_trans;
                    $trans_detail->created_by = Auth::user()->id;
                    if ($trans_detail->save()) {
                        $flg = '1';
                    }
                }

                if (isset($flg) && !empty($flg)) {
                    $request->session()->put('tab_type', 3);
                    $flag = 'success';
                    $msg = "Record Added Successfully";
                } else {
                    $request->session()->put('tab_type', 2);
                    $flag = 'danger';
                    $msg = "Record Not Added Successfully";
                }

                $request->session()->flash($flag, $msg);
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


            ///////////////update here activity and amenity detail//////////
            $delAmniety = AmenityDetail::deleteAmenity($acco_id);
            $delActivity = ActivityDetail::deleteActivity($acco_id);

            if ($request->activity) {

                ///////////////update here activity detail//////////
                if (is_array($request->amenity_property) && !empty($request->amenity_property)) {

                    foreach ($request->amenity_property as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $amenity_detail = new AmenityDetail;
                            $amenity_detail->accom_venu_promos_id = $acco_id;
                            $amenity_detail->desc = $request->amenity_desc;
                            $amenity_detail->amenity_id = $request->amenity_property[$key];
                            $amenity_detail->type = $request->type;
                            $amenity_detail->created_by = Auth::user()->id;
                            $amenity_detail->save();
                        }
                    }
                }

                ///////////////update here amenity detail//////////
                if (is_array($request->activity_property) && !empty($request->activity_property)) {

                    foreach ($request->activity_property as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $activity_detail = new ActivityDetail;
                            $activity_detail->accom_venu_promos_id = $acco_id;
                            $activity_detail->desc = $request->activity_desc;
                            $activity_detail->activity_id = $request->activity_property[$key];
                            $activity_detail->type = $request->type;
                            $activity_detail->created_by = Auth::user()->id;
                            $activity_detail->save();
                        }
                    }
                }

                ///////////////update here Attraction detail//////////
                if (is_array($request->attraction_name) && !empty($request->attraction_name)) {

                    foreach ($request->attraction_name as $key => $val) {
                        if (!empty($request->suur_id[$key]) && isset($request->suur_id[$key])) {

                            $surr_detail = SurroundingDetail::find($request->suur_id[$key]);
                            $surr_detail->accom_venu_promos_id = $acco_id;
                            $surr_detail->name = $request->attraction_name[$key];
                            $surr_detail->surrounding_id = $request->surrounding[$key];
                            $surr_detail->distance = $request->approx_dist[$key];
                            $surr_detail->shuttle = $request->shuttle;
                            $surr_detail->type = $request->type;
                            $surr_detail->updated_by = Auth::user()->id;
                            $surr_detail->save();
                        } else {

                            $surr_detail = new SurroundingDetail;
                            $surr_detail->accom_venu_promos_id = $acco_id;
                            $surr_detail->name = $request->attraction_name[$key];
                            $surr_detail->surrounding_id = $request->surrounding[$key];
                            $surr_detail->distance = $request->approx_dist[$key];
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
                $request->session()->put('tab_type', 4);

                return redirect(route('accomodation.edit', ['id' => $acco_id]));
            } else {

                ///////////////insert here amenity detail//////////

                if (is_array($request->amenity_property) && !empty($request->amenity_property)) {

                    foreach ($request->amenity_property as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $amenity_detail = new AmenityDetail;
                            $amenity_detail->accom_venu_promos_id = $acco_id;
                            $amenity_detail->desc = $request->amenity_desc;
                            $amenity_detail->amenity_id = $request->amenity_property[$key];
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
                    }
                }

                ///////////////insert here activity detail//////////

                if (is_array($request->activity_property) && !empty($request->activity_property)) {

                    foreach ($request->activity_property as $key => $val) {

                        if (isset($val) && !empty($val)) {

                            $activity_detail = new ActivityDetail;
                            $activity_detail->accom_venu_promos_id = $acco_id;
                            $activity_detail->desc = $request->activity_desc;
                            $activity_detail->activity_id = $request->activity_property[$key];
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
                    }
                }

                ///////////////insert here Surrounding detail//////////

                if (is_array($request->attraction_name) && !empty($request->attraction_name)) {

                    foreach ($request->attraction_name as $key => $val) {

                        if (isset($val) && !empty($val)) {

                            $surr_detail = new SurroundingDetail;
                            $surr_detail->accom_venu_promos_id = $acco_id;
                            $surr_detail->name = $request->attraction_name[$key];
                            $surr_detail->surrounding_id = $request->surrounding[$key];
                            $surr_detail->distance = $request->approx_dist[$key];
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

                    if (is_array($request->payment_type) && !empty($request->payment_type)) {

                        foreach ($request->payment_type as $key => $val) {
                            if (isset($val) && !empty($val)) {

                                $payment_detail = new PaymentAccept;
                                $payment_detail->policy_id = $request->policy_id;
                                $payment_detail->payment_mode_id = $request->payment_type[$key];
                                $payment_detail->save();
                            }
                        }
                    }
                }

                $flag = 'success';
                $msg = 'Record Updated Successfully';
                $request->session()->flash($flag, $msg);
                $request->session()->put('tab_type', 5);

                return redirect(route('accomodation.edit', ['id' => $acco_id]));
            } else {

                /////////Inser policy detail///////////////////

                if ($request->cancel) {

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
                    $policy_detail->save();
                }



                if (is_array($request->payment_type) && !empty($request->payment_type)) {

                    foreach ($request->payment_type as $key => $val) {
                        if (isset($val) && !empty($val)) {

                            $payment_detail = new PaymentAccept;
                            $payment_detail->policy_id = $policy_detail->id;
                            $payment_detail->payment_mode_id = $request->payment_type[$key];
                            $payment_detail->save();
                        }
                    }
                }

                $flag = "success";
                $msg = "Record Added Successfully";
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

                    $request->session()->put('tab_type', 6);

                    return redirect(route('accomodation.edit', ['id' => $acco_id]));
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
                    $request->session()->forget('tab_type');

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
    public function edit($id, Request $request) {

        try {

            if (app('request')->input('type') == 'P') {
                $request->session()->put('tab_type', 2);
            }
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
            $arr_health_detail = HealthDetail::getConferById($id);
            $arr_trans_detail = TransportDetail::getConferById($id);
            $arr_activity_detail = ActivityDetail::getActivityById($id);
            $arr_amenity_detail = AmenityDetail::getAmenityById($id);
            $arr_surr_detail = SurroundingDetail::getSurrById($id);
            $arr_policy_detail = PoliciyDetail::getPolicyById($id);
            $arr_meta_detail = MetaTagDetail::getMegaDetailById($id);
            $arr_video_detail = VideoMapDetail::getVideoMapById($id);
            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_room = $room_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_surr = $surr_data->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_amenity = $amenity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_activity = $activity->select('id', 'name')->orderBy('id', 'ASC')->get();
            $arr_payment = $payment_list->select('id', 'name')->orderBy('id', 'ASC')->get();

            return view('partner.accommodation.edit')->with(compact('user', 'arr_accommo_detail', 'arr_room_detail', 'arr_venu_detail', 'arr_confer_detail', 'arr_health_detail', 'arr_trans_detail', 'arr_activity_detail', 'arr_amenity_detail', 'arr_surr_detail', 'arr_policy_detail', 'arr_meta_detail', 'arr_video_detail', 'arr_accomm', 'arr_country', 'arr_room', 'arr_surr', 'arr_amenity', 'arr_activity', 'arr_payment'));
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

        if (isset($request->status)) {

            $accommodation->status = $request->status;
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
        $request->session()->put('tab_type', 2);

        return redirect(route('accomodation.edit', ['id' => $id]));
    }

    /**
     * setActiveThumb
     * @param
     * @return array
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function setActiveThumb($accom_id, $active) {

        if (!empty($active)) {
            /* set all 0 first */
            $arrProductImage1 = [];
            $arrProductImage1['active_thumb'] = '0';
            AccomVenuPromosImage::updateDataByAccomId($arrProductImage1, $accom_id);

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
            $getHealthImages = HealthDetail::getConferById($id);


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

            if (isset($getHealthImages) && !empty($getHealthImages) && count($getHealthImages) > 0) {

                foreach ($getHealthImages as $health) {

                    $healthImgArr = [];
                    $healthImgArr['path'] = 'health_images/';
                    $healthImgArr['pathT'] = 'health_images/thumbnail/';
                    $healthImgArr['pathR'] = 'health_images/resize/';
                    $healthImgArr['id'] = $health->id;
                    $healthImgArr['image_name'] = $health->health_image;

                    if ($health->health_image != '') {

                        Helper::unLinkImage($healthImgArr);
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
