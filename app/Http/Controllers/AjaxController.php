<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City\City;
use App\Model\Country\Country;
use App\Model\State\State;
use Auth;

class AjaxController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            $this->middleware('auth:admin');
            $this->middleware('admin');
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
    public function getState() {
        try {
            $varCountryID = (int) Request::query('varCountryID');
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
    public function getStateByID() {
        try {
            $varStateID = (int) Request::query('varStateID');
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
     * @Author Meghendra S Yadav
     */
    public function getCityByID() {
        try {
            $varCityID = (int) Request::query('varCityID');
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
    public function getCity() {
        $varStateID = (int) Request::query('varStateID');
        $result = $this->city->getAllCityByStateID($varStateID);
        return ($result ? Response::json($result) : (int) $result);
    }

}