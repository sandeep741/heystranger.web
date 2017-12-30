<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class ListDetailRequest extends Request {

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
        
        
        switch($this->method())
    {
        case 'GET':
        case 'DELETE':
        {
            return [];
        }
        case 'POST':
        {
            return [
                'accommo_list' => 'required',
                'shuttle' => 'required',
                'transport' => 'required',
                'additional' => 'required',
                'terms_conditions' => 'required'
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            if(Input::get('id')){
            return [
                'name' => 'required|unique:room_lists,name,'.Input::get('id').',id'
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
            
        ];
    }

}
