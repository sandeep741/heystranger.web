<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;

class AccomVenuPromo extends Model
{
    
    
    public static function getAccommodationList(){
        
        $arrCond = array('type' => 'A');
        $sqlQuery = self::with('accomType');
        $datas = $sqlQuery->where($arrCond)->orderBy('id', 'DESC')->paginate(10);
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
        return $this->belongsTo(\App\Model\Country\Country::class,'country_id');
    }
    
    /**
     * stateName
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function stateName()
    {
        return $this->belongsTo(\App\Model\State\State::class,'state_id');
    }
    
    /**
     * cityName
     * @return
     * @since 0.1
     * @author Sandeep Kumar
     */
    public function cityName()
    {
        return $this->belongsTo(\App\Model\City\City::class,'city_id');
    }
    
    /**
     * productImages
     * @return
     * @since 0.1
     * @author Sandeep Kumart
     */
    public function accommoImages()
    {
        return $this->hasMany(AccomVenuPromosImage::class, 'accom_venu_promos_id');
    }
    
    
    public static function getAccommodationById($id){
        
        $arrCond = array('id' => $id, 'status' => '1');
        $sqlQuery = self::with('accomType', 'countryName', 'stateName', 'cityName', 'accommoImages');
        $datas = $sqlQuery->where($arrCond)->first();
        return ($datas ? $datas : []);
    }
    
}
