<?php

namespace App\Model\MetaTag;

use Illuminate\Database\Eloquent\Model;

class MetaTagDetail extends Model
{
    public static function getMegaDetailById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
}
