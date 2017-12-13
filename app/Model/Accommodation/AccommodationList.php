<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class AccommodationList extends Model {
    
    /*use SoftDeletes;
    protected $table = 'accommodation_lists';
    protected $fillable = ['name', 'status'];
    protected $dates = ['deleted_at'];*/
    
    public function getNameAttribute($value) {
        return ucfirst($value);
    }

}
