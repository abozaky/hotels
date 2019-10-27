<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pricing_list extends Model
{
    public function roomAvailable()
    {
        return $this->belongsTo('App\room_available', 'room_available_id', 'id');
    }
}
