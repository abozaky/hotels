<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'city_enName' => $this->city_enName,
        //     'city_arName' => $this->city_arName,
        //     'hotels' => $this->hotels,
           
               
        //     ];
    }

   
}
