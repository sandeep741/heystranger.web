<?php

namespace App\Model\Policy;

use Illuminate\Database\Eloquent\Model;

class PoliciyDetail extends Model
{
    
    /**
     * paymentAccept
     * @return
     * @since 0.1
     * @author Sandeep Kumart
     */
    public function paymentAccept() {
        return $this->hasMany('App\Model\PaymentModeList\PaymentAccept', 'policy_id');
    }
    
    /**
     * getConferById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getPolicyById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::with('paymentAccept');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
}
