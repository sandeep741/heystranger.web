<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Accommodation\AccomVenuPromo;
use App\Model\Accommodation\AccommodationList;
use App\Http\Requests\Partner\AccommodationRequest;
use App\Model\State\State;
use App\Model\Country\Country;
use App\Model\City\City;
use Auth;

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
            $country = new Country;

            $arr_accomm = $accomm_data->select('id', 'name')->orderBy('id', 'DESC')->where('status', 1)->get();
            $arr_country = $country->select('id', 'name')->orderBy('id', 'ASC')->get();
            return view('partner.accommodation.create')->with(compact('user', 'arr_accomm', 'arr_country'));
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
                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }
            $request->session()->flash($flag, $msg);
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
