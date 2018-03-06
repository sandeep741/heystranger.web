<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\PackageList;
use App\Model\Package\PackageDetail;
use App\Model\Country\Country;
use App\role_admin;
use App\Admin;
use App\Http\Requests\JoinUsRequest;
use App\Http\Requests\JoinUsFirstRequest;
use App\Http\Controllers\Snowfire\Beautymail\Beautymail;
use DB;
use Hash;
use Mail;

class JoinUsController extends Controller {

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

    public function registerStep(JoinUsRequest $request) {

        try {

            $post = $request->all();
            unset($post['_token']);
            unset($post['password_confirmation']);
            unset($post['btn_reg']);
            $mail_pass = $post['password'];
            $post['password'] = Hash::make($post['password']);
            $post['email'] = $post['email_id'];
            unset($post['email_id']);
            


            $last_id = DB::table('admins')->insertGetId($post, 'column_id');
            if (isset($last_id) && !empty($last_id)) {
                $request->session()->put('user_id', $last_id);
                $request->session()->put('mail_pass', $mail_pass);
                return redirect()->route('register1');
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function registerStep1(JoinUsFirstRequest $request) {

        try {

            $post = $request->all();
            unset($post['_token']);
            unset($post['term_condition']);


            $update_record = DB::table('admins')->where('id', $request->Session()->get('user_id'))->update($post);
            /*$data = array('name'=>"Virat Gandhi");
   
            Mail::send(['text'=>'mail'], $data, function($message) {
               $message->to('sndpkmr741@gmail.com', 'Tutorials Point')->subject
                  ('Laravel Basic Testing Mail');
               $message->from('xyz@gmail.com','Virat Gandhi');
            });
            echo "Basic Email Sent. Check your inbox."; die;*/
            
            

            if (isset($update_record) && !empty($update_record)) {

                $role = new role_admin;
                $role->role_id = 2;
                $role->admin_id = $request->Session()->get('user_id');
                $role->save();


                ////////////////Send Mail to Users////////////

                $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                $get_temp = DB::table('admins')->where('id', $request->Session()->get('user_id'))->first();
                $name = $get_temp->name;
                $pass = $request->Session()->get('mail_pass');
                $email = $get_temp->email;
                $beautymail->send('emails.welcome', compact('email', 'pass'), function($message) use($email, $name) {
                    $message
                            ->from('info@heystranger.co.za')
                            ->to($email, $name)
                            ->subject('Welcome!');
                });


                //$flag = 'success';
                //$msg = "You have Successfully registered";
                $request->session()->forget('user_id');
                $request->session()->forget('mail_pass');

                //$request->session()->flash($flag, $msg);
                return redirect()->route('register2');
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
