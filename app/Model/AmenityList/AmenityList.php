<?php

namespace App\Model\AmenityList;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class AmenityList extends Model
{
    /*use SoftDeletes;
    protected $table = 'amenity_lists';
    protected $fillable = ['name', 'status'];
    protected $dates = ['deleted_at'];*/
    
    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
