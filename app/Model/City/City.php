<?php

namespace App\Model\City;

use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model {

    /**
     * Get All City By State ID
     * @param integer varStateID
     * @return array arrCity
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getAllCityByStateID($varStateID) {
        
        $where_condition = array('state_id' => $varStateID, 'status' => '1');
        //DB::enableQueryLog();
        $arrCity = SELF::select('id', 'name')
                ->where($where_condition)
                ->get();
        //dd(DB::getQueryLog());

        return ($arrCity ?: false);
    }

}
