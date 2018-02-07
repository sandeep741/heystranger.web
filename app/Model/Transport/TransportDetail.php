<?php

namespace App\Model\Transport;

use Illuminate\Database\Eloquent\Model;

class TransportDetail extends Model
{
    public static function getConferById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
}
