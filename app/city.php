<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function country()
    {
        return $this->belongsTo('App\country', 'country_id', 'id');
    }

    public function Hotels()
    {
        return $this->hasMany('App\Hotel', 'city_id');
    }

}
