<?php

namespace App\Model\AmenityList;

use Illuminate\Database\Eloquent\Model;

class AmenityDetail extends Model
{
    /**
     * getAmenityById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getAmenityById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
    
    /**
     * deleteAmenity
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function deleteAmenity($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $varDelete = self::where($arrCond)->delete();
        return ($varDelete ? $varDelete : false);
    }
}
