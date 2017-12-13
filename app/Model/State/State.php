<?php

namespace App\Model\State;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * getStateByCountryID
     * param integer varStateID
     * @return array arrState
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getStateByCountryID($id)
    {
        $arrState = self::leftJoin("countries", 'countries.id', '=', 'states.country_id')
            ->select('state.*', 'mst_country.name as country_name')
            ->whereIn('mst_state.country_id', $id)
            ->where('mst_state.status', '=', '1')
            ->orderBy('mst_state.name')
            ->get();
        return ($arrState ? $arrState : []);
    }
}
