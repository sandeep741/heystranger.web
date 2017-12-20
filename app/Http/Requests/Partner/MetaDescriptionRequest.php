<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class MetaDescriptionRequest extends Request {

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
                'title' => 'required',
                'keyword' => 'required',
                'meta_desc' => 'required'
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            if(Input::get('id')){
            return [
                
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
