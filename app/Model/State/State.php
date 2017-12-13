<?php

namespace App\Model\State;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

    /**
     * getStateByCountryID
     * param integer varStateID
     * @return array arrState
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getStateByCountryID($id) {
        $where_condition = array('states.country_id' => $id, 'states.status' => '1');
        $arrState = self::leftJoin("countries", 'countries.id', '=', 'states.country_id')
                ->select('states.id', 'states.name', 'countries.name as country_name')
                ->where($where_condition)
                ->orderBy('states.name')
                ->get();
        return ($arrState ? $arrState : []);
    }

}
