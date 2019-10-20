<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\city;
use App\Hotel;
use App\Room;

use App\Http\Resources\HotelsResource;
use App\Http\Resources\HotelsResourceCollection;

class AllHotelsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try{
           
            $AllHotels = Hotel::with(['hotelTranslation','Rooms'=> function ($query) { $query->with('RoomTranslation'); } ])
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
