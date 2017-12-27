<?php

namespace App\Helpers;

use App;
use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Image;
use Request;

class Helper {

    /**
     * Get the register path for the application
     * 
     * @return string
     */
    public static function getRegisterPath() {
        return App::make('App\Http\Controllers\Auth\AuthController')->registerPath();
    }

    /**
     * Get the login path for the application
     * 
     * @return string
     */
    public static function getLoginPath() {
        return App::make('App\Http\Controllers\Auth\AuthController')->loginPath();
    }

    /**
     * Get the logout path for the application
     * 
     * @return string
     */
    public static function getLogoutPath() {
        return App::make('App\Http\Controllers\Auth\AuthController')->logoutPath();
    }

    /**
     * Get the Current Location From Session
     * 
     * @return string
     */
    public static function getCurrentLocation() {
        return Request::session()->get('Location');
    }

    /**
     * Get Date Format
     *
     * @param type   $date
     *
     * @param string $format
     *
     * @return string
     */
    public static function getDateByFormat($date = null, $fromFormat = 'Y-m-d H:i:s', $format = 'd M Y') {

        try {
            if (empty($date) || $date == "0000-00-00") {
                $date = '';
            } else {

                $date = Carbon::createFromFormat($fromFormat, $date)->format($format);
            }

            return $date;
        } catch (InvalidArgumentException $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getToken() {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    /**
     * Id_encode
     *
     * This function to encode ID by a custom number
     * @param string
     *
     */
    public static function ID_encode($id) {
        $encode_id = '';
        if ($id) {
            $encode_id = rand(1, 9) . (($id + 19)) . rand(1, 9);
        } else {
            $encode_id = '';
        }
        return $encode_id;
    }

    /* End of function */

    /**
     * Id_decode
     *
     * This function to decode ID by a custom number
     * @param string
     *
     */
    public static function ID_decode($encoded_id) {
        $id = '';
        if ($encoded_id) {
            $id = substr($encoded_id, 1, strlen($encoded_id) - 2);
            $id = $id - 19;
        } else {
            $id = '';
        }
        return $id;
    }

    /* End of function */


    /* numberConvert
     * @paran
     * @return array
     * @author Sandeep Kumar
     */

    public static function numberConvert($number) {
        try {
            $b = str_replace(',', '', $number);

            if (is_numeric($b)) {
                $number = $b;
            }
            return $number;
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    public static function getParentRouteName() {
        try {

            $data = [];
            $data['parent'] = Request::segment(1);
            switch ($data['parent']) {
                case 'accommlist':
                    $data['active'] = 'active';
                    break;
                case 'amenitylist':
                    $data['active'] = 'active';
                    break;
                case 'activitylist':
                    $data['active'] = 'active';
                    break;
                case 'roomlist':
                    $data['active'] = 'active';
                    break;
                case 'paymentmodelist':
                    $data['active'] = 'active';
                    break;
                case 'surroundinglist':
                    $data['active'] = 'active';
                    break;
                case 'accomodation':
                    $data['active'] = 'active';
                    break;
                default:
                    $data['active'] = '';
            }

            return $data;
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /* UploadImage
     * @paran
     * @return array
     * @author Sandeep Kumar
     */

    public static function UploadImage($request, $arr_img, $i = null) {

        try {

            /* room multiple image upload */
            if ($request->file($arr_img['img_name']) && !empty($request->file($arr_img['img_name']))) {

                $files = $request->file($arr_img['img_name']);

                if (isset($i)) {

                    $rules = array($arr_img['img_name'] => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                    $validator = Validator::make(array($arr_img['img_name'] => $files[$i]), $rules);

                    if ($validator->passes()) {

                        $filename = $arr_img['id'] . '_' . $files[$i]->getClientOriginalName();
                        // make thumb nail of image
                        $destinationThumb = $arr_img['folder'] . '/thumbnail';
                        if (!file_exists($destinationThumb)) {
                            mkdir($destinationThumb, 0777, true);
                        }

                        // image reszie
                        $destinationResize = $arr_img['folder'] . '/resize';
                        if (!file_exists($destinationResize)) {
                            mkdir($destinationResize, 0777, true);
                        }

                        $img = Image::make($files[$i]->getRealPath());

                        $img->resize(80, 80, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationThumb . '/' . $filename);

                        $img = Image::make($files[$i]->getRealPath());
                        $img->resize(300, 300, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationResize . '/' . $filename);

                        $destinationPath = $arr_img['folder'];
                        $files[$i]->move($destinationPath, $filename);
                    }
                    return true;
                } else {

                    foreach ($files as $file) {

                        $rules = array($arr_img['img_name'] => 'required|mimes:png,gif,jpeg|max:2048'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                        $validator = Validator::make(array($arr_img['img_name'] => $file), $rules);

                        if ($validator->passes()) {

                            $filename = $arr_img['id'] . '_' . $arr_img['time'] . '_' . $file->getClientOriginalName();
                            // make thumb nail of image
                            $destinationThumb = $arr_img['folder'] . '/thumbnail';
                            if (!file_exists($destinationThumb)) {
                                mkdir($destinationThumb, 0777, true);
                            }

                            // image reszie
                            $destinationResize = $arr_img['folder'] . '/resize';
                            if (!file_exists($destinationResize)) {
                                mkdir($destinationResize, 0777, true);
                            }

                            $img = Image::make($file->getRealPath());

                            $img->resize(80, 80, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save($destinationThumb . '/' . $filename);

                            $img = Image::make($file->getRealPath());
                            $img->resize(300, 300, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save($destinationResize . '/' . $filename);

                            $destinationPath = $arr_img['folder'];
                            $file->move($destinationPath, $filename);
                        }
                    }
                    return true;
                }
            }
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage() . " In " . $ex->getFile() . " At Line " . $ex->getLine())->withInput();
        }
    }

    /* unLinkImage
     * @paran
     * @return array
     * @author Sandeep Kumar
     */

    public static function unLinkImage($img_detail = array()) {

        if (isset($img_detail['id']) && !empty($img_detail['id'])) {

            $img_path = $img_detail['path'] . $img_detail['id'] . '_' . $img_detail['image_name'];
            $img_pathT = $img_detail['pathT'] . $img_detail['id'] . '_' . $img_detail['image_name'];
            $img_pathR = $img_detail['pathR'] . $img_detail['id'] . '_' . $img_detail['image_name'];
        } else {
            $img_path = $img_detail['path'] . $img_detail['image_name'];
            $img_pathT = $img_detail['pathT'] . $img_detail['image_name'];
            $img_pathR = $img_detail['pathR'] . $img_detail['image_name'];
        }


        if (file_exists($img_path)) {
            unlink($img_path);
        }
        if (file_exists($img_pathT)) {
            unlink($img_pathT);
        }
        if (file_exists($img_pathR)) {
            unlink($img_pathR);
        }
    }

}
