<?php

namespace App\Model\SurroundingList;

use Illuminate\Database\Eloquent\Model;

class SurroundingDetail extends Model
{
    /**
     * getSurrById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getSurrById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
}
