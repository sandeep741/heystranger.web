<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;

class AccomVenuPromo extends Model
{
    
    
    public static function getAccommodationList(){
        
        $arrCond = array('type' => 'A', 'status' => '1');
        $sqlQuery = self::with('accomType');
        $datas = $sqlQuery->where($arrCond)->orderBy('id', 'DESC')->paginate(5);
        return ($datas ? $datas : []);
    }
    
    /**
     * accomType
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function accomType()
    {
        return $this->belongsTo(AccommodationList::class);
    }
    
    /**
     * countryName
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function countryName()
    {
        return $this->belongsTo(\App\Model\Country\Country::class,'id');
    }
    
    
    public static function getAccommodationById($id){
        
        $arrCond = array('id' => $id);
        $sqlQuery = self::with('accomType', 'countryName');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
    
}
