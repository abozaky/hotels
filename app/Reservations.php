<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    public function Rooms()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }
}
