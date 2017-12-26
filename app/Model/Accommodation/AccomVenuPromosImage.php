<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;
use DB;

class AccomVenuPromosImage extends Model
{
    /**
     * updateData
     * @param
     * @return array arrEmployer
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function updateDataByProduct($input, $acco_id)
    {
        $data = self::where(['accom_venu_promos_id' => (int) $acco_id])->update($input);
        return $data;
    }

    /**
     * updateData
     * @param
     * @return array arrEmployer
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function updateDataByImage($input, $image_id)
    {
        $data = self::where(['id' => (int) $image_id])->update($input);
        return $data;
    }
}
