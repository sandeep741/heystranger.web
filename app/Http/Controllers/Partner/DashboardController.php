<?php

namespace App\Http\Controllers\Partner;

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
        $this->middleware('auth:admin');
        $this->middleware('partner');
    }

    public function index() {
        $user = Auth::guard('admin')->user();

        return view('partner.welcome')->with(compact('user'));
    }

}
