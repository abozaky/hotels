<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_available extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }
   
    public function PricingLists()
  
  {
       return $this->belongsTo('App\pricing_list', 'price_list', 'id');
   
  }
  public function Reservations()
  {
      return $this->hasManyThrough('App\Reservations', 'App\Room','id');
  }
}
