<?php

namespace App\Model\Offer;

use Illuminate\Database\Eloquent\Model;

class OfferDetail extends Model
{
   public static function getOfferById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
}
