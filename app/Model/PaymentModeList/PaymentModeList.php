<?php

namespace App\Model\PaymentModeList;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class PaymentModeList extends Model
{
    /*use SoftDeletes;
    protected $table = 'amenity_lists';
    protected $fillable = ['name', 'status'];
    protected $dates = ['deleted_at'];*/
    
    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
