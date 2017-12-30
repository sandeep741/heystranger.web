<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\PackageList;
use App\Http\Requests\ListDetailRequest;

class PackageController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            //$this->middleware('auth');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {

            $all_records = new PackageList;
            $packages = $all_records->where('status', 1)->orderBy('id', 'ASC')->limit(5)->get();
            return view('package.package')->with(compact('packages'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function listDetail(Request $request) {

        try {

            if (isset($request->pkg_id) && !empty($request->pkg_id)) {
                $pkg_id = decrypt($request->pkg_id);
                $pkg_detail = PackageList::find($pkg_id);
                $accommo_listing = '';

                if ($pkg_detail->package_type == 'F') {
                    if ($pkg_detail->is_listing1 == 'Y') {
                        $accommo_listing = 7;
                    } else if ($pkg_detail->is_listing2 == 'Y') {
                        $accommo_listing = 15;
                    } else if ($pkg_detail->is_listing3 == 'Y') {
                        $accommo_listing = 50;
                    }
                } else if ($pkg_detail->package_type == 'P') {
                    $accommo_listing = 50;
                }
            }


            return view('package.listing-detail')->with(compact('pkg_id', 'accommo_listing'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function partnerRegister(ListDetailRequest $request) {

        try {

            if (isset($request->pkg_id) && !empty($request->pkg_id)) {

                $pkg_id = decrypt($request->pkg_id);
                $pkg_id_ecrypt = $request->pkg_id;
                $pkg_detail = PackageList::find($pkg_id);
                $accommo_listing = '';

                if ($pkg_detail->package_type == 'F') {
                    if ($pkg_detail->is_listing1 == 'Y') {
                        $accommo_listing = 7;
                    } else if ($pkg_detail->is_listing2 == 'Y') {
                        $accommo_listing = 15;
                    } else if ($pkg_detail->is_listing3 == 'Y') {
                        $accommo_listing = 50;
                    }
                } else if ($pkg_detail->package_type == 'P') {
                    $accommo_listing = 50;
                }
            }


            return view('package.final-register')->with(compact('pkg_id_ecrypt', 'accommo_listing'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
