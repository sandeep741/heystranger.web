<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class AccommodationRequest extends Request {

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

                    //$type = Input::get('type');

                    return [
                        //'name' => 'required|unique:accom_venu_promos,title,NULL,id,type,' . Input::get('type'),
						'name' => 'required',
                        'country' => 'required',
                        'state' => 'required',
                        'city' => 'required',
                        'reserving_email' => 'nullable|email',
                    ];


                    /* if ($type == 'A') {
                      return [
                      'name' => 'required|unique:accom_venu_promos,title,NULL,id,type,'.$type,
                      'name' => [
                      'required',
                      Rule::exists('accom_venu_promos', 'title')
                      ->where(function ($query) use ($type) {
                      $query->where('type', '<>', $type);
                      }),
                      ],
                      'country' => 'required',
                      'state' => 'required',
                      'city' => 'required',
                      'reserving_email' => 'nullable|email',
                      ];
                      }

                      if ($type == 'V') {
                      return [
                      'name' => [
                      'required',
                      Rule::exists('accom_venu_promos', 'title')
                      ->where(function ($query) use ($type) {
                      $query->where('type', '=', $type);
                      $query->where('title', '=', Input::get('name'));
                      }),
                      ],
                      'name' => 'required|unique:accom_venu_promos,title,NULL,id,type,'.$type,
                      'country' => 'required',
                      'state' => 'required',
                      'city' => 'required',
                      'reserving_email' => 'nullable|email',
                      ];
                      } */
                }
            case 'PUT':
            case 'PATCH': {

                    //$type = Input::get('type');

                    /* if (Input::get('id')) {
                      return [
                      'name' => 'required|unique:accom_venu_promos,title,' . Input::get('id') . ',id',
                      'country' => 'required',
                      'state' => 'required',
                      'city' => 'required',
                      'reserving_email' => 'nullable|email',
                      ];
                      } */

                    if (Input::get('id')) {
                        return [
                            //'name' => 'required|unique:accom_venu_promos,title,' . Input::get('id') . ',id,type,' . Input::get('type'),
							'name' => 'required',
                            'country' => 'required',
                            'state' => 'required',
                            'city' => 'required',
                            'reserving_email' => 'nullable|email',
                        ];
                    }



                    /* if ($type == 'V') {
                      return [
                      'name' => 'required|unique:accom_venu_promos,title,'. Input::get('id') .',id,type,'.$type,
                      'name' => [
                      'required',
                      Rule::exists('accom_venu_promos', 'title')
                      ->where(function ($query) use ($type) {
                      $query->where('type', '<>', $type);
                      $query->where('id', '<>', Input::get('id'));
                      }),
                      ],
                      'country' => 'required',
                      'state' => 'required',
                      'city' => 'required',
                      'reserving_email' => 'nullable|email',
                      ];
                      } else if($type == 'A'){

                      return [
                      'name' => 'required|unique:accom_venu_promos,title,'. Input::get('id') .',id,type,'.$type,
                      'country' => 'required',
                      'state' => 'required',
                      'city' => 'required',
                      'reserving_email' => 'nullable|email',
                      ];

                      } */

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
            'name.required' => 'Name is required.',
            'name.unique' => 'Name not available',
        ];
    }

}
