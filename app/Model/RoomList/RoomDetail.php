<?php

namespace App\Model\RoomList;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoomDetail extends Model {

    /**
     * roomType
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function roomType() {
        return $this->belongsTo(RoomList::class, 'room_type_id');
    }

    /**
     * getRoomById
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function getRoomById($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        $sqlQuery = self::with('roomType');
        $datas = $sqlQuery->where($arrCond)->get();
        return ($datas ? $datas : []);
    }
    
    /**
     * deleteRoom
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public static function deleteRoom($id) {

        $arrCond = array('accom_venu_promos_id' => $id, 'status' => '1');
        
        DB::table('room_details')->where($arrCond)->delete();
    }

}