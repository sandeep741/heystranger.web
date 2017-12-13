<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentModeListRequest;
use App\Model\PaymentModeList\PaymentModeList;
use Auth;

class PaymentModeListController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $all_records = new PaymentModeList;
        $datas = $all_records->orderBy('id', 'DESC')->paginate(5);
        return view('admin.paymentmodelist.index')->with(compact('user', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('admin')->user();

        return view('admin.paymentmodelist.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentModeListRequest $request)
    {
        $amenity_list = new PaymentModeList;
        $amenity_list->name = $request->name;
        if ($amenity_list->save()) {
            $flag = 'success';
            $msg = "Record Added Successfully";
        } else {
            $flag = 'danger';
            $msg = "Record Not Added Successfully";
        }

        $request->session()->flash($flag, $msg);
        return redirect(route('paymentmodelist.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $edit_data = PaymentModeList::find($id);

        return view('admin.paymentmodelist.edit')->with(compact('user', 'edit_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentModeListRequest $request, $id)
    {
        $edit_data = PaymentModeList::find($id);

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
        return redirect(route('paymentmodelist.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (PaymentModeList::where('id', $id)->delete()) {
            $flag = 'success';
            $msg = 'Record Deleted Successfully';
        } else {
            $flag = 'danger';
            $msg = 'Record Not Deleted Successfully';
        }
        $request->session()->flash($flag, $msg);
        return redirect()->back();
    }
}
