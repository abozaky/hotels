<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HotelsResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
         // return parent::toArray($request);
        if(\Request::getPathInfo() == "/api/searchhotels"){

            return [

                'Search_Hotels' => HotelsResource::collection($this->collection),
                
            ];
        }elseif(\Request::getPathInfo() == "/api/hotelsfilter"){

            return [
                'HotelsFilter' => HotelsResource::collection($this->collection),
                
            ];
        }elseif(\Request::getPathInfo() == "/api/hotels"){

            return [
                'HotelsDefault' => HotelsResource::collection($this->collection),
                
            ];
        }
      
    }

    public function with($request)
    {
        
        return [
            
                'Status' => 'success',
                'Error' => 'No Errors Found',
            
        ];
    }
}
