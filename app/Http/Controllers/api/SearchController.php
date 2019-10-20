<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\city;

use App\Hotel;
use App\Room;
use App\Reservations;

use App\Http\Resources\HotelsResource;
use App\Http\Resources\HotelsResourceCollection;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $SearchByCity = city::with(['Hotels' => 
                        function ($query) {
                                $query->with(['hotelTranslation','Rooms'=> 
                                    function ($query) { 
                                             $query->with(['RoomTranslation','reservations'=> 
                                                function ($query){ 
                                                //Exam to check in an out 
                                                $from = date("2019-10-21") ;
                                                $to = date("2019-10-23") ;
                                                // End Exam
                                                    $query->whereRaw("reservation_from <= ? AND reservation_to >= ? ",  array($from, $from))
                                                    ->orwhereRaw("reservation_from <= ? AND reservation_to >= ? ",  array($to, $to));  
                                                                }
                                                            ]);
                                                        } 
                                                ]);
                                            }
                                        ])
                    ->where('city_enName','like','hurghada')
                    ->orWhere('city_arName','like','الغردقة')
                    ->paginate(5);

            return (new HotelsResourceCollection($SearchByCity))->response()->setStatusCode(200);          
         
        }catch(\Exception $e){

               $response = [

                  'data'=>"Not found Data",
                  'error'=>$e->getMessage(),
                  
               ];
         
             return response($response,404);
            }

    }

}
