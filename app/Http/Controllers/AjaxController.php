<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Model\City\City;
use App\Model\Country\Country;
use App\Model\State\State;
use App\Model\Accommodation\AccomVenuPromosImage;
use App\Model\RoomList\RoomDetail;
use App\Model\Conference\ConferenceDetail;
use App\Model\Health\HealthDetail;
use App\Model\Venu\VenuDetail;
use App\Model\Offer\OfferDetail;
use App\Model\SurroundingList\SurroundingDetail;
use App\Helpers\Helper;
use Auth;

class AjaxController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            //$this->middleware('auth:admin');
            //$this->middleware('admin');
            $this->state = new State();
            $this->city = new City();
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Get State By Country ID
     * @param void
     * @return mixed Json | 0 (in case of failure)
     * @since 0.1
     */
    public function getState(Request $request) {
        try {
            $varCountryID = (int) $request->query('varCountryID');
            $result = $this->state->getStateByCountryID([$varCountryID]);
            return ($result ? Response::json($result) : (int) $result);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Get State By ID
     * @param void
     * @return mixed Json | 0 (in case of failure)
     * @since 0.1
     */
    public function getStateByID(Request $request) {
        try {
            $varStateID = (int) $request->query('varStateID');
            $result = $this->state->getStateByID($varStateID);
            return ($result ? Response::json($result) : (int) $result);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Get City By ID
     * @param 
     * @return mixed Json | 0 (in case of failure)
     * @since 0.1
     * @Author Sandeep Kumar
     */
    public function getCityByID(Request $request) {
        try {
            $varCityID = (int) $request->query('varCityID');
            $result = $this->city->getCityByID($varCityID);
            return ($result ? Response::json($result) : (int) $result);
        } catch (Exception $ex) {
            
        }
    }

    /**
     * Get City By State ID
     * 
     * @param void
     * @return mixed Json | 0 (in case of failure)
     * @since 0.1
     */
    public function getCity(Request $request) {
        $varStateID = (int) $request->query('varStateID');
        $result = $this->city->getAllCityByStateID($varStateID);
        return ($result ? Response::json($result) : (int) $result);
    }

    /**
     * removeProductImage
     * @param
     * @return json
     * @since version 0.1
     * @author Sandeep Kumar
     */
    public function removeProductImage(Request $request) {
        $varID = $request->get('varID');

        $data = AccomVenuPromosImage::find($varID);


        $imgArr = [];
        $imgArr['path'] = 'accom_venu_promo_images/';
        $imgArr['pathT'] = 'accom_venu_promo_images/thumbnail/';
        $imgArr['pathR'] = 'accom_venu_promo_images/resize/';
        $imgArr['id'] = '';
        $imgArr['image_name'] = $data->image_name;

        if ($data->image_name != "") {

            Helper::unLinkImage($imgArr);
        }

        $result = $data->delete();
        return ($result ? Response::json($result) : $result);
    }

    /**
     * removeRoom
     * @param
     * @return json
     * @since version 0.1
     * @author Sandeep Kumar
     */
    public function removeRoom(Request $request) {

        $varID = $request->get('varID');
        $flg = $request->get('flag');

        switch ($flg) {
            case 'room':
                $data = RoomDetail::find($varID);
                $imgArr = [];
                $imgArr['path'] = 'room_images/';
                $imgArr['pathT'] = 'room_images/thumbnail/';
                $imgArr['pathR'] = 'room_images/resize/';
                $imgArr['id'] = $data->id;
                $imgArr['image_name'] = $data->room_image;

                if ($data->room_image != "") {

                    Helper::unLinkImage($imgArr);
                }

                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            case 'venu';
                $data = VenuDetail::find($varID);

                $venuImgArr = [];
                $venuImgArr['path'] = 'venue_images/';
                $venuImgArr['pathT'] = 'venue_images/thumbnail/';
                $venuImgArr['pathR'] = 'venue_images/resize/';
                $venuImgArr['id'] = $data->id;
                $venuImgArr['image_name'] = $data->venu_image;

                if ($data->venu_image) {

                    Helper::unLinkImage($venuImgArr);
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);

                break;
            case 'confer':

                $data = ConferenceDetail::find($varID);

                $conferImgArr = [];
                $conferImgArr['path'] = 'confer_images/';
                $conferImgArr['pathT'] = 'confer_images/thumbnail/';
                $conferImgArr['pathR'] = 'confer_images/resize/';
                $conferImgArr['id'] = $data->id;
                $conferImgArr['image_name'] = $data->confer_image;


                if ($data->confer_image) {

                    Helper::unLinkImage($conferImgArr);
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;

            case 'health':

                $data = HealthDetail::find($varID);

                $healthImgArr = [];
                $healthImgArr['path'] = 'health_images/';
                $healthImgArr['pathT'] = 'health_images/thumbnail/';
                $healthImgArr['pathR'] = 'health_images/resize/';
                $healthImgArr['id'] = $data->id;
                $healthImgArr['image_name'] = $data->health_image;


                if ($data->health_image) {

                    Helper::unLinkImage($healthImgArr);
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            case 'surr':

                $data = SurroundingDetail::find($varID);
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            case 'offer':

                $data = OfferDetail::find($varID);

                $offerImgArr = [];
                $offerImgArr['path'] = 'extra_images/';
                $offerImgArr['pathT'] = 'extra_images/thumbnail/';
                $offerImgArr['pathR'] = 'extra_images/resize/';
                $offerImgArr['id'] = $data->id;
                $offerImgArr['image_name'] = $data->offer_image;


                if ($data->offer_image) {

                    Helper::unLinkImage($offerImgArr);
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            default:
                $data = "null";
        }
    }

}
