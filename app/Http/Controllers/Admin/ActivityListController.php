<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityListRequest;
use App\Model\ActivityList\ActivityList;
use Auth;

class ActivityListController extends Controller {

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
            $all_records = new ActivityList;
            $datas = $all_records->orderBy('id', 'DESC')->paginate(5);
            return view('admin.activitylist.index')->with(compact('user', 'datas'));
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

            return view('admin.activitylist.create')->with(compact('user'));
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
    public function store(ActivityListRequest $request) {
        try {
            $amenity_list = new ActivityList;
            $amenity_list->name = $request->name;
            if ($amenity_list->save()) {
                $flag = 'success';
                $msg = "Record Added Successfully";
            } else {
                $flag = 'danger';
                $msg = "Record Not Added Successfully";
            }

            $request->session()->flash($flag, $msg);
            return redirect(route('activitylist.index'));
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
            $edit_data = ActivityList::find($id);

            return view('admin.activitylist.edit')->with(compact('user', 'edit_data'));
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
    public function update(ActivityListRequest $request, $id) {
        try {
            $edit_data = ActivityList::find($id);

            if ($request->name) {
                $edit_data->name = $request->name;
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
            return redirect(route('activitylist.index'));
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
            if (ActivityList::where('id', $id)->delete()) {
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
