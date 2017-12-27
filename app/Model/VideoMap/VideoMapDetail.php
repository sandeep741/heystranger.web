<?php

namespace App\Model\VideoMap;

use Illuminate\Database\Eloquent\Model;

class VideoMapDetail extends Model
{
    public static function getVideoMapById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
}
