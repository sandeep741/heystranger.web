<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class UserDetailRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {


        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'first_name' => 'required',
                        'country' => 'required',
                        'state' => 'required',
                        'city' => 'required',
                        'user' => 'required|unique:admins,user',
                        'user' => 'required|unique:temp_record,user',
                        'email' => 'required|email|unique:admins,email',
                        'email' => 'required|email|unique:temp_record,email',
                        'password' => 'required|min:6',
                        'confirm_password' => 'required|same:password',
                        'mobile' => 'required|numeric|digits:10',
                        'landline' => 'required|numeric|digits:10',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    if (Input::get('id')) {
                        return [
                            'name' => 'required|unique:room_lists,name,' . Input::get('id') . ',id'
                        ];
                    }
                    return [];
                }
            default:break;

                return [
                ];
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'email.required' => 'Email is required',
            'email.unique' => 'email not available',
            'user.unique' => 'username not available',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters.',
            'confirm_password.required' => 'Confirm Password is required',
            'confirm_password.same' => 'Confirm Password should match with password',
            'mobile.required' => 'Mobile number is required',
            'mobile.numeric' => 'Mobile number should be numeric',
            'mobile.digits' => 'Mobile number must be 10 digits',
            'landline.required' => 'landline number is required',
            'landline.numeric' => 'landline number should be numeric',
            'landline.digits' => 'landline number must be 10 digits',
        ];
    }

}
