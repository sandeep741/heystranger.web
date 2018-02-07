<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;
use DB;

class AccomVenuPromosImage extends Model
{
    /**
     * updateDataByAccomId
     * @param
     * @return array
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function updateDataByAccomId($input, $acco_id)
    {
        $data = self::where(['accom_venu_promos_id' => (int) $acco_id])->update($input);
        return $data;
    }

    /**
     * updateDataByImage
     * @param
     * @return array
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function updateDataByImage($input, $image_id)
    {
        $data = self::where(['id' => (int) $image_id])->update($input);
        return $data;
    }
    
    /**
     * getImagesById
     * @param
     * @return array
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getImagesById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::select('*');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
}
