<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\PackageList;
use App\Model\Package\PackageDetail;
use App\Model\Country\Country;
use App\role_admin;
use App\Admin;
use App\Http\Requests\ListDetailRequest;
use App\Http\Requests\UserDetailRequest;
use App\Http\Controllers\Package\Snowfire\Beautymail\Beautymail;
use DB;

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

    public function registerStep1(Request $request) {

        try {


            if (isset($request->pkg_id) && !empty($request->pkg_id)) {

                $pkg_id = decrypt($request->pkg_id);
                $pkg_detail = PackageList::find($pkg_id);


                if ($pkg_detail->package_type == 'F') {

                    if ($pkg_detail->is_listing1 == 'Y') {
                        $acc_list = 7;
                    } else if ($pkg_detail->is_listing2 == 'Y') {
                        $acc_list = 15;
                    } else if ($pkg_detail->is_listing3 == 'Y') {
                        $acc_list = 50;
                    }
                } else if ($pkg_detail->package_type == 'P') {

                    $acc_list = 50;
                }
            }

            $request->session()->put('package_id', $request->pkg_id);
            $request->session()->put('accommolist', $acc_list);

            return redirect()->route('register-step1');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function registerStep2(ListDetailRequest $request) {

        try {

            if (!empty($request->session()->get('package_id'))) {

                $accommo_no = $request->accommo_no;
                $venu_conf = $request->is_acco_venu_conf;
                $transport = $request->is_transport;
                $additional = $request->is_additional;
                $pkg_id = decrypt($request->session()->get('package_id'));

                $dataset = array('accommo_no' => $accommo_no,
                    'is_acco_venu_conf' => $venu_conf,
                    'is_transport' => $transport,
                    'is_additional' => $additional,
                    'pkg_id' => $pkg_id
                );


                $temp_id = DB::table('temp_record')->insertGetId($dataset, 'column_id');

                $pkg_data = PackageList::find($pkg_id);

                if (isset($pkg_data) && !empty($pkg_data) && count($pkg_data) > 0) {

                    $request->session()->put('pkg_data', $pkg_data);
                    $request->session()->put('temp_id', $temp_id);
                    $request->session()->put('accommo_no', $accommo_no);
                    $request->session()->put('venu_conf', $venu_conf);
                    $request->session()->put('transport', $transport);
                    $request->session()->put('additional', $additional);
                    return redirect()->route('register-step2');
                }
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function registerStep3(UserDetailRequest $request) {

        try {

            $last_id = $request->Session()->get('temp_id');
            if (isset($last_id) && !empty($last_id)) {

                ////////////////Insert Record in temporary table////////////
                $dataset = array('first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'landline_no' => $request->landline,
                    'mobile_no' => $request->mobile,
                    'country_id' => $request->country,
                    'state_id' => $request->state,
                    'city_id' => $request->city,
                    'address' => $request->address,
                    'email' => $request->email,
                    'user' => $request->user,
                    'password' => bcrypt($request->password)
                );

                $update_temp = DB::table('temp_record')
                        ->where('id', $last_id)
                        ->update($dataset);

                $get_temp = DB::table('temp_record')->where('id', $last_id)->first();



                $pkg_data = PackageList::find($get_temp->pkg_id);



                if ($pkg_data->package_type == 'F') {

                    ////////////////Insert Record Admin////////////
                    $user_obj = new \App\Admin;
                    $user_obj->first_name = $get_temp->first_name;
                    $user_obj->last_name = $get_temp->last_name;
                    $user_obj->landline_no = $get_temp->landline_no;
                    $user_obj->mobile_no = $get_temp->mobile_no;
                    $user_obj->country_id = $get_temp->country_id;
                    $user_obj->state_id = $get_temp->state_id;
                    $user_obj->city_id = $get_temp->city_id;
                    $user_obj->address = $get_temp->address;
                    $user_obj->email = $get_temp->email;
                    $user_obj->user = $get_temp->user;
                    $user_obj->password = $get_temp->password;

                    $user_id = $user_obj->save();

                    if ($user_id) {

                        $role = new role_admin;
                        $role->role_id = 2;
                        $role->admin_id = $user_id;
                        $role->save();

                        ////////////////Insert Record in Package////////////
                        $pkg_obj = new PackageDetail;
                        $pkg_obj->user_id = $user_id;
                        $pkg_obj->name = $pkg_data->name;
                        $pkg_obj->is_listing1 = $pkg_data->is_listing1;
                        $pkg_obj->is_listing2 = $pkg_data->is_listing2;
                        $pkg_obj->is_listing3 = $pkg_data->is_listing3;
                        $pkg_obj->is_referal = $pkg_data->is_referal;
                        $pkg_obj->is_acco_venu_conf = $pkg_data->is_acco_venu_conf;
                        $pkg_obj->is_transport = $pkg_data->is_transport;
                        $pkg_obj->is_additional = $pkg_data->is_additional;
                        $pkg_obj->package_type = $pkg_data->package_type;
                        $pkg_obj->price = $pkg_data->price;
                        $pkg_obj->vat = $pkg_data->vat;
                        $pkg_obj->commision = $pkg_data->commision;
                        $pkg_obj->status = $pkg_data->status;
                        $pkg_obj->created_by = $pkg_data->created_by;

                        $pkg_detail_id = $pkg_obj->save();

                        $flag = 'success';
                        $msg = 'You have registered Successfully..';


                        ////////////////Send Mail to Users////////////

                        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);

                        $name = $get_temp->first_name;
                        $user = $request->user;
                        $pass = $request->password;
                        $email = $get_temp->email;
                        $beautymail->send('emails.welcome', compact('user', 'pass'), function($message) {
                            $message
                                    ->from('info@heystranger.co.za')
                                    ->to('sndpkmr741@gmail.com', 'sandeep')
                                    ->subject('Welcome!');
                        });

                        ////////////////Session Unset after complete register////////////
                        $request->session()->forget('pkg_data');
                        $request->session()->forget('temp_id');
                        $request->session()->forget('accommo_no');
                        $request->session()->forget('venu_conf');
                        $request->session()->forget('transport');
                        $request->session()->forget('additional');
                        $request->session()->forget('arr_country');
                        $request->session()->forget('package_id');
                        $request->session()->forget('accommolist');
                        $request->session()->flash($flag, $msg);


                        return view('package.register-step3')->with(compact('name', 'email'));
                    }
                } else {




                    return redirect()->route('register-step3');
                }
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function registerStep4(Request $request) {

        try {

            $last_id = $request->Session()->get('temp_id');

            if (isset($last_id) && !empty($last_id)) {

                $get_temp = DB::table('temp_record')->where('id', $last_id)->first();
                $pkg_data = PackageList::find($get_temp->pkg_id);

                ////////////////Insert Record Admin////////////
                $user_obj = new \App\Admin;
                $user_obj->first_name = $get_temp->first_name;
                $user_obj->last_name = $get_temp->last_name;
                $user_obj->landline_no = $get_temp->landline_no;
                $user_obj->mobile_no = $get_temp->mobile_no;
                $user_obj->country_id = $get_temp->country_id;
                $user_obj->state_id = $get_temp->state_id;
                $user_obj->city_id = $get_temp->city_id;
                $user_obj->address = $get_temp->address;
                $user_obj->email = $get_temp->email;
                $user_obj->user = $get_temp->user;
                $user_obj->status = '2';
                $user_obj->password = $get_temp->password;

                $user_id = $user_obj->save();

                if ($user_id) {

                    $role = new role_admin;
                    $role->role_id = 2;
                    $role->admin_id = $user_id;
                    $role->save();

                    ////////////////Insert Record in Package////////////
                    $pkg_obj = new PackageDetail;
                    $pkg_obj->user_id = $user_id;
                    $pkg_obj->name = $pkg_data->name;
                    $pkg_obj->is_listing1 = $pkg_data->is_listing1;
                    $pkg_obj->is_listing2 = $pkg_data->is_listing2;
                    $pkg_obj->is_listing3 = $pkg_data->is_listing3;
                    $pkg_obj->is_referal = $pkg_data->is_referal;
                    $pkg_obj->is_acco_venu_conf = $pkg_data->is_acco_venu_conf;
                    $pkg_obj->is_transport = $pkg_data->is_transport;
                    $pkg_obj->is_additional = $pkg_data->is_additional;
                    $pkg_obj->package_type = $pkg_data->package_type;
                    $pkg_obj->price = $pkg_data->price;
                    $pkg_obj->vat = $pkg_data->vat;
                    $pkg_obj->commision = $pkg_data->commision;
                    $pkg_obj->status = $pkg_data->status;
                    $pkg_obj->created_by = $pkg_data->created_by;

                    $pkg_detail_id = $pkg_obj->save();

                    $flag = 'success';
                    $msg = 'You have registered Successfully..';


                    ////////////////Send Mail to Users////////////

                    $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);

                    $name = $get_temp->first_name;
                    $user = $get_temp->user;
                    $pass = $get_temp->password;
                    $email = $get_temp->email;
                    $beautymail->send('emails.welcome', compact('user', 'pass'), function($message) {
                        $message
                                ->from('info@heystranger.co.za')
                                ->to('sndpkmr741@gmail.com', 'sandeep')
                                ->subject('Welcome!');
                    });

                    ////////////////Session Unset after complete register////////////
                    $request->session()->forget('pkg_data');
                    $request->session()->forget('temp_id');
                    $request->session()->forget('accommo_no');
                    $request->session()->forget('venu_conf');
                    $request->session()->forget('transport');
                    $request->session()->forget('additional');
                    $request->session()->forget('arr_country');
                    $request->session()->forget('package_id');
                    $request->session()->forget('accommolist');
                    $request->session()->flash($flag, $msg);


                    return view('package.register-step4')->with(compact('name', 'email'));
                }
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
