<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Hotel;
use App\Http\Resources\HotelsResourceCollection;
  

class SearchAndFilterController extends Controller
{
    /**
     * This fucntion used in 3 pages (Search - Filter - hotels by defautl value )
     *
     * @return void
     */

    public function hotelsSearchAndFilter(Request $request)

    {

         $request->validate([
            
               'check_in'       => 'required|date|after_or_equal:'.date("Y-m-d"),
               'check_out'      => 'required|date|after_or_equal:check_in',
               'city_name'      => 'nullable|string',
               'locale'         => 'required|string|max:2',
               'nationality'    => 'required|string|max:2',
               'user_type'      => 'required',
               'adult'          => 'required|numeric',
               'filter_price_from'         => 'numeric|nullable',
               'filter_price_to'           => 'numeric|nullable',
               'filter_hotel_facilities'   => 'string|nullable|max:100',
               'filter_room_type'          => 'string|nullable|max:100'
            
            ]) ;
   
   try{
            
         if (\Request::input('adult') == 1) {
            $bed = "single";
         }elseif(\Request::input('adult') == 2){
            $bed = "double";
         }else{
            $bed = "triple";
         }
      
   

         if ( (\Request::input('filter_price_from')) == null or (\Request::input('filter_price_to')) == null) {
            $filter_from = 1;
            $filter_to = 10000;
         
         }else{
            $filter_from = \Request::input('filter_price_from');
            $filter_to = \Request::input('filter_price_to');
         }


      $SearchByCity = Hotel::with('city')
             ->whereHas('city',function ($q){ $q->where('city_enName','like','%'.\Request::input('city_name').'%')
                                                ->orWhere('city_arName','like','%'.\Request::input('city_name').'%') 
                                           ;})
             ->with([ 'hotelTranslation' => function ($q){ $q->where('locale',\Request::input('locale')) ; }
                     ,'Rooms' => function ($q) use ($bed,$filter_from,$filter_to) { 
                                                     $q->where('bed',$bed)
                                                             ->with(['RoomTranslation'=> function ($q){ $q->where('locale',\Request::input('locale')) ;}
                                                                     ,'RoomAvailable'  => function ($q) use ($filter_from,$filter_to) { 
                                                                                                        $q->with('PricingLists')
                                                                                                         ->whereHas('PricingLists',function  ($q) use ($filter_from,$filter_to){ 
                                                                                                                                     
                                                                                                                         $q->where('nationality','like','%'.\Request::input('nationality').'%')
                                                                                                                             ->where('user_type' ,\Request::input('user_type'))   
                                                                                                                             ->whereBetween('price_adult',array($filter_from,$filter_to))
                                                                                                                     ; })
                                                                                                         ->with(['Reservations' => function ($q){
                                                                                                                  $q->whereRaw("reservation_from <= ? AND reservation_to >= ? ",  array(\Request::input('check_in'), \Request::input('check_in')))
                                                                                                                     ->orwhereRaw("reservation_from <= ? AND reservation_to >= ? ",  array(\Request::input('check_out'), \Request::input('check_out')))
                                                                                                                     ->orwhereRaw("reservation_from >= ? AND reservation_to <= ? ",  array(\Request::input('check_in'), \Request::input('check_out')))
                                                                                                                     ; }])
                                                                                                             ;} 
                                                                    
                                                                     ])
                                                               ->whereHas('RoomAvailable',  function ($q){ 
                                                                         $q->whereRaw("date_from <= ? AND date_to >= ? ",  array(\Request::input('check_in'), \Request::input('check_in') ))
                                                                                 ; })
                                                 ;    $q->where('room_type','like','%'.\Request::input('filter_room_type').'%'); 
                                 } 
                     ])
             ->where('hotel_facilities','like','%'.\Request::input('filter_hotel_facilities').'%')
             ->orderBy('stars','desc')
             ->paginate();


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