<?php

namespace App\Model\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    /**
     * Get All City By State ID
     * @param integer varStateID
     * @return array arrCity
     * @since 0.1
     * @author Ashish Vishwakarma
     */
    public static function getAllCityByStateID($varStateID) {
        $where_condition = array('state_id' => $varStateID, 'status' => '1');
        $arrCity = SELF::select('id', 'name')
                ->where($where_condition)
                ->get();

        return ($arrCity ?: false);
    }

}
