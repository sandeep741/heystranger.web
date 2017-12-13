<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            $this->middleware('auth:admin');
            $this->middleware('admin');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function index() {
        try {
            $user = Auth::guard('admin')->user();

            return view('admin.welcome')->with(compact('user'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
