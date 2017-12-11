<?php

namespace App\Model\Accommodation;

use Illuminate\Database\Eloquent\Model;

class AccommodationList extends Model {

    public function getNameAttribute($value) {
        return ucfirst($value);
    }

}
