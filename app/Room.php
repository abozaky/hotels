<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  public function RoomTranslation()
    {
        return $this->hasMany('App\RoomTranslation', 'room_id');
    }
 
    public function reservations() {
      return $this->hasMany('App\Reservations', 'room_id');
  }
  public function RoomAvailable()
  {
      return $this->hasMany('App\room_available', 'room_id');
  }
  
}
