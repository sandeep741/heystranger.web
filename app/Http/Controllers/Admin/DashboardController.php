<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    
    public function index(){
        
        $user = Auth::guard('admin')->user();
        
        return view('admin.welcome')->with(compact('user'));
        
        
        
    }
}
