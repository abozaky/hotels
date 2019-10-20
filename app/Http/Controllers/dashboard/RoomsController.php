<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localization;
use App\Room;
use App\RoomTranslation;
use App\HotelTranslation;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rooms = RoomTranslation::where('locale','En')->with('room')->get();
        $hotelName= HotelTranslation::where('locale','En')->get();
        return view('dashboard/pages/Rooms',compact('Rooms','hotelName'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotelID)
    {

        $languages = Localization::all();

        return view('dashboard/pages/Add_Rooms',compact('languages','hotelID'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    return $request ;

        // validation data before insert data to db
        $request->validate([

            'room_number'                 => 'required|numeric' ,
            'price_adult'                 => 'required|numeric' ,
            'price_child'                 => 'required|numeric' ,
            'hotel_id'                    => 'required|numeric' ,
            'locale=En'                   => 'required|string'  ,
            'name=En'                     => 'required|string'  ,
            'options=En'                  => 'required|string'  ,
            'cancelation_details=En'      => 'required'         ,
            'locale=Ar'                   => 'required|string'  ,
            'name=Ar'                     => 'required|string'  ,
            'options=Ar'                  => 'required|string'  ,
            'cancelation_details=Ar'      => 'required'   ,

        ]) ;

        // insert data to rooms table and get room ID to used it to room_translation table
            $Room = new Room();
            $Room->room_number = $request->get('room_number');
            $Room->price_adult = $request->get('price_adult');
            $Room->price_child = $request->get('price_child');
            $Room->hotel_id = $request->get('hotel_id');
            $Room->save();
            $currentId = $Room->id;
        // insert data to hotel_translation by Hotel_id

            $languages = Localization::all();
            foreach ($languages as $language) {

                $RoomTranslation = new RoomTranslation();
                $RoomTranslation->locale = $request->get('locale='.$language->name);
                $RoomTranslation->name = $request->get('name='.$language->name);
                $RoomTranslation->options = $request->get('options='.$language->name);
                $RoomTranslation->cancelation_details = $request->get('cancelation_details='.$language->name);
                $RoomTranslation->room_id = $currentId;
                $RoomTranslation->save();

            }
            return redirect()->back()->with('success','Room Added');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Room = Room::where('id',$id)->first();
        $RoomTranslation = RoomTranslation::where('room_id',$id)->get();
        return view('dashboard/pages/Edit_room_translation',compact('Room','RoomTranslation'));
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
        //  return $request;
         $Room = Room::find($id);

         $Room->room_number = $request->get('room_number');
         $Room->price_adult = $request->get('price_adult');
         $Room->price_child = $request->get('price_child');
         $Room->save();

         $languages = Localization::all();
         foreach ($languages as $language) {

             $RoomTranslation = RoomTranslation::where('room_id', $id)->where('locale',$language->name)->first();
             $RoomTranslation->name = $request->get('name='.$language->name);
             $RoomTranslation->options = $request->get('options='.$language->name);
             $RoomTranslation->cancelation_details = $request->get('cancelation_details='.$language->name);
             $RoomTranslation->save();
         }
         return redirect()->back()->with('success','Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Room = Room::find($id);
        $Room->delete();

      return redirect()->back()->with('success','Room Deeleted');
    }
}
