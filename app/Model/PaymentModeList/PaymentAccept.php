<?php

namespace App\Model\PaymentModeList;

use Illuminate\Database\Eloquent\Model;

class PaymentAccept extends Model
{
    /**
     * deleteActivity
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function deletePaymentAccept($id) {

        $arrCond = array('policy_id' => $id);
        $varDelete = self::where($arrCond)->delete();
        return ($varDelete ? $varDelete : false);
    }
}
