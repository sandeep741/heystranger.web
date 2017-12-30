<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class PackageListRequest extends Request {

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
                        'name' => 'required|unique:package_lists,name',
                        'is_listing1' => 'required',
                        'is_listing2' => 'required',
                        'is_listing3' => 'required',
                        'is_referal' => 'required',
                        'is_acco_venu_conf' => 'required',
                        'is_transport' => 'required',
                        'is_additional' => 'required',
                        //'vat' => 'nullable|integer|between:1,100',
                        'package_type' => 'required',
                        //'price' => 'required',
                        //'commision' => 'required|integer|between:1,100',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    if (Input::get('id')) {
                        return [
                            'name' => 'required|unique:package_lists,name,' . Input::get('id') . ',id',
                            'is_listing1' => 'required',
                            'is_listing2' => 'required',
                            'is_listing3' => 'required',
                            'is_referal' => 'required',
                            'is_acco_venu_conf' => 'required',
                            'is_transport' => 'required',
                            'is_additional' => 'required',
                            //'vat' => 'nullable|integer|between:1,100',
                            'package_type' => 'required',
                            //'price' => 'required',
                            //'commision' => 'required|integer|between:1,100',
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
            'name.required' => 'Name is required.',
            'name.unique' => 'Pacakage name not available',
        ];
    }

}
