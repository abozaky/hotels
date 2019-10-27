<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_available extends Model
{
    public function room()
    {
        return $this->belongsTo('App\room', 'room_id', 'id');
    }
}
