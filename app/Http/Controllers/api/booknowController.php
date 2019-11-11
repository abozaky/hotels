<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelsResource;

use App\billing_information;
use App\Reservations;
class booknowController extends Controller
{
    /**
     * adult
     * @return \Illuminate\Http\Response
     */
    public function bookNow(Request $request)

    {
        $request->validate([
            
            'check_in'       => 'required|date|after_or_equal:'.date("Y-m-d"),
            'check_out'      => 'required|date|after_or_equal:check_in',
            'adults'         => 'required|numeric',
            'childern'       => 'required|numeric',
            'total_price'    => 'required|numeric',
            'room_id'        => 'required|numeric',
            'user_id'        => 'required|numeric',
            'card_number'    => 'required|numeric|digits:16',
            'ccv'            => 'required|numeric|digits:3',
            'card_name'      => 'required|string|max:50',
            'street_address' => 'required|string|max:50',
            'city'           => 'required|string|max:50',
            'post_code'      => 'required|numeric|digits_between:1,5',
            'contacts_name'  => 'required|string|max:50',
            'email'          => 'required',
            'phone_number'   => 'required|numeric|digits_between:1,13',
            'code'           => 'required|numeric|digits_between:1,5'
    
       ]) ;
       

    try{ 
        $billing_information = new billing_information();
        $billing_information->card_number       = \Request::input('card_number');
        $billing_information->ccv               = \Request::input('ccv');
        $billing_information->card_name         = \Request::input('card_name');
        $billing_information->street_address    = \Request::input('street_address');
        $billing_information->city              = \Request::input('city');
        $billing_information->post_code         = \Request::input('post_code');
        $billing_information->contacts_name     = \Request::input('contacts_name');
        $billing_information->email             = \Request::input('email');
        $billing_information->phone_number      = \Request::input('phone_number');
        $billing_information->code              = \Request::input('code');
        $billing_information->save();
        
        $billing_id = $billing_information->id;

        $Reservations = new Reservations();
        $Reservations->reservation_from  = \Request::input('check_in');
        $Reservations->reservation_to    = \Request::input('check_out');
        $Reservations->adults            = \Request::input('adults');
        $Reservations->childern          = \Request::input('childern');
        $Reservations->total_price       = \Request::input('total_price');
        $Reservations->room_id           = \Request::input('room_id');
        $Reservations->user_id           = \Request::input('user_id');
        $Reservations->billing_id = $billing_id;
        
        $Reservations->save();
       
            
            return (new HotelsResource($Reservations))->response()->setStatusCode(200);          
    }catch(\Exception $e){

        $response = [

           'data'=>"Not found Data",
           'error'=>$e->getMessage(),
           
        ];
  
      return response($response,404);
     }

    }
}
