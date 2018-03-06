<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class PartnerListController extends Controller {

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {

            $user = Auth::guard('admin')->user();
            $all_records = new Admin;
            $datas = $all_records->where('id', '<>', '1')->orderBy('name', 'ASC')->paginate(5);
            return view('admin.partnerlist.index')->with(compact('user', 'datas'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        try {

            if (Admin::where('id', $id)->delete()) {
                $flag = 'success';
                $msg = 'Record Deleted Successfully';
            } else {
                $flag = 'danger';
                $msg = 'Record Not Deleted Successfully';
            }
            $request->session()->flash($flag, $msg);
            return redirect()->back();
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
    public function update(Request $request, $id) {
        try {

            $edit_data = Admin::find($id);
            $edit_data->status = $request->status;
            

            if ($edit_data->save()) {
                $flag = 'success';
                $msg = 'Record Updated Successfully';
            } else {
                $flag = 'danger';
                $msg = 'Record Not Updated Successfully';
            }

            $request->session()->flash($flag, $msg);
            return redirect(route('partnerlist.index'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
