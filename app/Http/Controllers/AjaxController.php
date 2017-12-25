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
use App\Model\Venu\VenuDetail;
use App\Model\Offer\OfferDetail;
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

        $path = 'accom_venu_promo_images/';
        $pathT = 'accom_venu_promo_images/thumbnail/';
        $pathR = 'accom_venu_promo_images/resize/';
        if ($data->image_name != "") {
            if (file_exists($path . $data->image_name)) {
                unlink($path . $data->image_name);
            }
            if (file_exists($pathT . $data->image_name)) {
                unlink($pathT . $data->image_name);
            }
            if (file_exists($pathR . $data->image_name)) {
                unlink($pathR . $data->image_name);
            }
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
                $path = 'room_images/';
                $pathT = 'room_images/thumbnail/';
                $pathR = 'room_images/resize/';
                if ($data->room_image != "") {
                    if (file_exists($path . $data->id . '_' . $data->room_image)) {
                        unlink($path . $data->id . '_' . $data->room_image);
                    }
                    if (file_exists($pathT . $data->id . '_' . $data->room_image)) {
                        unlink($pathT . $data->id . '_' . $data->room_image);
                    }
                    if (file_exists($pathR . $data->id . '_' . $data->room_image)) {
                        unlink($pathR . $data->id . '_' . $data->room_image);
                    }
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            case 'venu';
                $data = VenuDetail::find($varID);
                $path = 'venue_images/';
                $pathT = 'venue_images/thumbnail/';
                $pathR = 'venue_images/resize/';
                if ($data->venu_image) {
                    if (file_exists($path . $data->id . '_' . $data->venu_image)) {
                        unlink($path . $data->id . '_' . $data->venu_image);
                    }
                    if (file_exists($pathT . $data->id . '_' . $data->venu_image)) {
                        unlink($pathT . $data->id . '_' . $data->venu_image);
                    }
                    if (file_exists($pathR . $data->id . '_' . $data->venu_image)) {
                        unlink($pathR . $data->id . '_' . $data->venu_image);
                    }
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);

                break;
            case 'confer':

                $data = ConferenceDetail::find($varID);
                $path = 'confer_images/';
                $pathT = 'confer_images/thumbnail/';
                $pathR = 'confer_images/resize/';

                if ($data->confer_image) {
                    if (file_exists($path . $data->id . '_' . $data->confer_image)) {
                        unlink($path . $data->id . '_' . $data->confer_image);
                    }
                    if (file_exists($pathT . $data->id . '_' . $data->confer_image)) {
                        unlink($pathT . $data->id . '_' . $data->confer_image);
                    }
                    if (file_exists($pathR . $data->id . '_' . $data->confer_image)) {
                        unlink($pathR . $data->id . '_' . $data->confer_image);
                    }
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            case 'offer':

                $data = OfferDetail::find($varID);
                $path = 'extra_images/';
                $pathT = 'extra_images/thumbnail/';
                $pathR = 'extra_images/resize/';

                if ($data->offer_image) {
                    if (file_exists($path . $data->id . '_' . $data->offer_image)) {
                        unlink($path . $data->id . '_' . $data->offer_image);
                    }
                    if (file_exists($pathT . $data->id . '_' . $data->offer_image)) {
                        unlink($pathT . $data->id . '_' . $data->offer_image);
                    }
                    if (file_exists($pathR . $data->id . '_' . $data->offer_image)) {
                        unlink($pathR . $data->id . '_' . $data->offer_image);
                    }
                }
                $result = $data->delete();
                return ($result ? Response::json($result) : $result);
                break;
            default:
                $data = "null";
        }
    }

}
