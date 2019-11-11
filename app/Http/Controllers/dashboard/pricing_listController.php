<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pricing_list;
use App\room_available;

class pricing_listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricingLists = pricing_list::with(['roomAvailable'=> function ($query){ $query->with(['room'=> function ($query){ $query->with(['RoomTranslation'=> function($query){$query->where('locale','En'); } ]);  }  ]); }]) ->get();
        return view('dashboard/pages/pricing_lists',compact('pricingLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

           // validation data before insert data to db
           $request->validate([

            'date_from'               => 'required' ,
            'date_to'                 => 'required' ,
            'room_id'                 => 'required|numeric' ,
            'user_type'               => 'required|string'  ,
            'price_adult'             => 'required|numeric' ,
            'price_child'             => 'required|numeric' ,
            'nationality'             => 'required'  ,
            
        ]) ;
         // insert data to roomsAvailable table and get roomAvailable ID to used it to pricing_list table
      
      
         $pricing_list = new pricing_list();
         $pricing_list->nationality = json_encode($request->get('nationality'));
         $pricing_list->user_type = $request->get('user_type');
         $pricing_list->price_adult = $request->get('price_adult');
         $pricing_list->price_child = $request->get('price_child');
         $pricing_list->save();
         $price_listt_id = $pricing_list->id;

         $room_available = new room_available();
         $room_available->date_from = $request->get('date_from');
         $room_available->date_to = $request->get('date_to');
         $room_available->room_id = $request->get('room_id');
         $room_available->price_list = $price_listt_id ;
         
         $room_available->save();
        

         return redirect('dashboard/pricing_list')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($RoomID)
    {
        return view('dashboard/pages/Add_new_price',compact('RoomID'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pricing_list = pricing_list::find($id);
        $pricing_list->delete();

        return redirect()->back()->with('success','Role Deeleted');
    }
}
