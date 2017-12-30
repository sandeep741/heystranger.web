<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageListRequest;
use App\Model\Package\PackageList;
use Auth;

class PackageListController extends Controller {

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
            $all_records = new PackageList;
            $datas = $all_records->orderBy('name', 'ASC')->paginate(5);
            return view('admin.packagelist.index')->with(compact('user', 'datas'));
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

            return view('admin.packagelist.create')->with(compact('user'));
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
    public function store(PackageListRequest $request) {
        try {
            
            $package_list = new PackageList;
            $package_list->name = $request->name;
            $package_list->is_listing1 = $request->is_listing1;
            $package_list->is_listing2 = $request->is_listing2;
            $package_list->is_listing3 = $request->is_listing3;
            $package_list->is_referal = $request->is_referal;
            $package_list->is_acco_venu_conf = $request->is_acco_venu_conf;
            $package_list->is_transport = $request->is_transport;
            $package_list->is_additional = $request->is_additional;
            $package_list->price = $request->price;
            $package_list->vat = $request->vat;
            $package_list->package_type = $request->package_type;
            $package_list->commision = $request->commision;
            $package_list->created_by = Auth::user()->id;
            if ($package_list->save()) {
                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }

            $request->session()->flash($flag, $msg);
            return redirect(route('packagelist.index'));
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

        try {
            
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        try {

            $user = Auth::guard('admin')->user();
            $edit_data = PackageList::find($id);
            return view('admin.packagelist.edit')->with(compact('user', 'edit_data'));
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
    public function update(PackageListRequest $request, $id) {
        try {

            $edit_data = PackageList::find($id);
            
            if ($request->name) {
                $edit_data->name = $request->name;
                $edit_data->is_listing1 = $request->is_listing1;
                $edit_data->is_listing2 = $request->is_listing2;
                $edit_data->is_listing3 = $request->is_listing3;
                $edit_data->is_referal = $request->is_referal;
                $edit_data->is_acco_venu_conf = $request->is_acco_venu_conf;
                $edit_data->is_transport = $request->is_transport;
                $edit_data->is_additional = $request->is_additional;
                $edit_data->price = $request->price;
                $edit_data->vat = $request->vat;
                $edit_data->package_type = $request->package_type;
                $edit_data->commision = $request->commision;
                $edit_data->updated_by = Auth::user()->id;
            } else {
                $edit_data->status = $request->status;
            }

            if ($edit_data->save()) {
                $flag = 'success';
                $msg = 'Record Updated Successfully';
            } else {
                $flag = 'danger';
                $msg = 'Record Not Updated Successfully';
            }

            $request->session()->flash($flag, $msg);
            return redirect(route('packagelist.index'));
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

            if (PackageList::where('id', $id)->delete()) {
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

}
