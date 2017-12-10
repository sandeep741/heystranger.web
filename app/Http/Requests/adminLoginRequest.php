<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class adminLoginRequest extends Request {

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

        return [
            'login' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'login.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }

}
