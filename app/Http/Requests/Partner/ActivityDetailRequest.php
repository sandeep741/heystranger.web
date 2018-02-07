<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class ActivityDetailRequest extends Request {

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
                //'amenity_desc' => 'required',
                //'amenity_property' => 'required',
                //'activity_desc' => 'required',
                //'activity_property' => 'required',
                'attraction_name.0' => 'required',
                'surrounding.0' => 'required',
                'approx_dist.0' => 'required',
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            if(Input::get('id')){
            return [
                'name' => 'required|unique:accom_venu_promos,title,'.Input::get('id').',id'
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
            'attraction_name.0.required' => 'Attraction name is required.',
            'surrounding.0.required' => 'Type of Attraction is required.',
            'approx_dist.0.required' => 'Distance is required.',
            'shuttle.required' => 'Select Shuttle servie field.',
        ];
    }

}
