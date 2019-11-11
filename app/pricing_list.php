<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pricing_list extends Model
{
    public function roomAvailable()
    {
        return $this->hasMany('App\room_available', 'price_list');
    }
}
