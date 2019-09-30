<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelTranslation;
use App\Hotel;
use App\countries;
use App\Localization;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $HotelTranslation = HotelTranslation::where('locale','En')->get();
        return view('dashboard/pages/hotels',compact('HotelTranslation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = countries::all();
        $Hotels = Hotel::where('id',$id)->first();
        $HotelTranslation = HotelTranslation::where('hotel_id',$id)->get();
        return view('dashboard/pages/Edit_hotel_translation',compact('countries','HotelTranslation','Hotels'));
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
        // return $request;
        $Hotel = Hotel::find($id);

        $Hotel->country_id = $request->get('country_id');
        $Hotel->stars = $request->get('stars');
          // query to Edit multiple files and check before add
          if( $request->hasfile('images') )
          {
             foreach( $request->file('images') as $image )
             {
              $imageName = time().'.'.$image->getClientOriginalName();
              $image->move(public_path('hotel_Images'), $imageName);
              $data[] = $imageName;  
              $Hotel->photos = json_encode($data);
             }
          }
        $Hotel->save();

        $languages = Localization::all();
        foreach ($languages as $language) {

            $HotelTranslation = HotelTranslation::where('hotel_id', $id)->where('locale',$language->name)->first();
            $HotelTranslation->name = $request->get('hotel_Name='.$language->name);
            $HotelTranslation->description = $request->get('description='.$language->name);
            $HotelTranslation->address = $request->get('address='.$language->name);
            $HotelTranslation->save();
        }
        return redirect()->back()->with('success','Hotel Updated');

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Hotel = Hotel::find($id);
        $Hotel->delete();
    
      return redirect()->back()->with('success','Data Deeleted');
    }
}
