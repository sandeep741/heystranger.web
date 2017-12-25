<?php

namespace App\Model\Venu;

use Illuminate\Database\Eloquent\Model;

class VenuDetail extends Model {

    public static function getVenuById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }

}
