<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class PolicyDetailRequest extends Request {

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
                'cancel' => 'required',
                'timein' => 'required',
                'timeout' => 'required',
                'payment_type' => 'required',
                'acco_duration' => 'required',
                'corpo_deals' => 'required',
                'contract_deal' => 'required',
                'policy_terms' => 'required',
                //'item.0' => 'required',
                //'extra_price.0' => 'required',
                //'extra_cond.0' => 'required',
                
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            if(Input::get('id')){
            return [
                //'item.0.required' => 'Item name required',
                //'extra_price.0.required' => 'Price required',
                //'extra_cond.0.required' => 'condition required',
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
            'item.0.required' => 'Item name required',
            'extra_price.0.required' => 'Price required',
            'extra_cond.0.required' => 'condition required',
        ];
    }

}
