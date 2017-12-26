<?php

namespace App\Model\ActivityList;

use Illuminate\Database\Eloquent\Model;

class ActivityDetail extends Model {

    /**
     * getConferById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getActivityById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
    
    /**
     * getConferById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function deleteActivity($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $varDelete = self::where($arrCond)->delete();
        return ($varDelete ? $varDelete : false);
    }

}
