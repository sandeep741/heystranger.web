<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class RoomDetailRequest extends Request {

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
                'room_desc' => 'required',
                'room_type.0' => 'required',
                'guest.0' => 'required',
                'room_avail.0' => 'required',
                'room_price.0' => 'required',
                'room_short_desc.0' => 'required',
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            return [
                'room_desc' => 'required',
                'room_type.0' => 'required',
                'guest.0' => 'required',
                'room_avail.0' => 'required',
                'room_price.0' => 'required',
                'room_short_desc.0' => 'required',
            ];
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
            'room_type.0.required' => 'Room Type is required.',
            'guest.0.required' => 'Max Guest is required.',
            'room_avail.0.required' => 'Room Avail is required.',
            'room_price.0.required' => 'Room Price is required.',
            'room_short_desc.0.required' => 'Room short desc is required.',
        ];
    }

}
