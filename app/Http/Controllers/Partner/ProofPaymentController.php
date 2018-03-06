<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\Helpers\Helper;


class ProofPaymentController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        try {
            $this->middleware('auth:admin');
            $this->middleware('partner');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function index() {
        try {
            $user = Auth::guard('admin')->user();
            return view('partner.proof-payment')->with(compact('user'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public function uploadProof(Request $request) {
        try {

            $rules = [
                'proof_image.0' => 'required|mimes:jpg,jpeg,bmp,png,pdf|max:2048',
            ];

            $messages = [
                'proof_image.*' => 'Please select file',
                'proof_image.*.max' => 'Maximum 2 MB file can upload'
            ];

            $this->validate($request, $rules, $messages);

            $file = $request->file('proof_image');
            $id = Auth::user()->id;

            $update_record = Admin::find($id);

            $filename = $update_record->proof_image;
            $real_name = $file[0]->getClientOriginalName();

            $imgArr = [];
            $imgArr['path'] = 'payment_proof/';
            $imgArr['pathT'] = 'payment_proof/thumbnail/';
            $imgArr['pathR'] = 'payment_proof/resize/';
            $imgArr['id'] = '';
            $imgArr['image_name'] = $filename;

            Helper::unLinkImage($imgArr);

            $arr_accom_img = array(
                'folder' => 'payment_proof',
                'img_name' => 'proof_image',
                'id' => Auth::user()->id,
                'time' => time()
            );

            Helper::UploadImage($request, $arr_accom_img);

            $update_record = Admin::find($id);
            $update_record->proof_image = $id . '_' . $arr_accom_img['time'] . '_' . $real_name;
            if ($update_record->save()) {
                $flg = 'success';
                $msg = 'Payment of Proof Uploaded Successfully';

                $request->session()->flash($flg, $msg);
                return redirect()->back();
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }
    
    public function activateRegistration(){
        try {
            $user = Auth::guard('admin')->user();
            return view('partner.activate-registration')->with(compact('user'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }
    
    public function invoice(){
        try {
            $user = Auth::guard('admin')->user();
            return view('partner.invoice')->with(compact('user'));
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

}
