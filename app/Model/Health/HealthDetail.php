<?php

namespace App\Model\Health;

use Illuminate\Database\Eloquent\Model;

class HealthDetail extends Model
{
    public static function getConferById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
}
