<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PartnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('auth:admin');
        $this->middleware('partner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('partner.welcome')->with(compact('user'));
    }
}
