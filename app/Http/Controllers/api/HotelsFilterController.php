<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelsResource;
use App\Http\Resources\HotelsResourceCollection;

use App\city;
use App\Hotel;
use App\Room;

class HotelsFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // request price from & to 
        // request room type
     
        try{
           
            $AllHotels = Hotel::with(['hotelTranslation','Rooms'=> function ($query) {
                
                $query
                ->whereBetween('price_adult', [300, 600])
                ->with('RoomTranslation')
                ->whereHas('RoomTranslation', function($query){
                        $query->where('options', 'Room Only')->where('locale', 'En');
                });
               
                
                
              
                
                } ])
                        ->orderBy('stars', 'desc')
                        ->paginate(5);

            return (new HotelsResourceCollection($AllHotels))->response()->setStatusCode(200);          
         
        }catch(\Exception $e){

               $response = [

                  'data'=>"Not found Data",
                  'error'=>$e->getMessage(),
                  
               ];
         
             return response($response,404);
            }

    }
}
