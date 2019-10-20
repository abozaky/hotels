<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function hotelTranslation()
    {
        return $this->hasMany('App\HotelTranslation', 'hotel_id');
    }
    
    public function Rooms()
    {
        return $this->hasMany('App\Room', 'hotel_id');
    }

    public function RoomTranslation()
    {
        return $this->hasManyThrough('App\RoomTranslation', 'App\Room');
    }
    
    public function city()
    {
        return $this->belongsTo('App\city', 'city_id', 'id');
    }
}
