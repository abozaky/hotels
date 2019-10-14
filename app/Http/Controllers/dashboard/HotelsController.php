<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelTranslation;
use App\Hotel;
use App\country;
use App\city;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = country::all();
        $cities = city::all();
        $Hotels = Hotel::where('id',$id)->first();
        $HotelTranslation = HotelTranslation::where('hotel_id',$id)->get();
        return view('dashboard/pages/Edit_hotel_translation',compact('countries','HotelTranslation','Hotels','cities'));
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
          // validation data before insert data to db
          $request->validate([
 
            'country_id'      => 'required|numeric' ,
            'city_id'         => 'required|numeric' ,
            'stars'           => 'required|numeric' ,
            'locale=En'       => 'required|string'  ,
            'hotel_Name=En'   => 'required|string'  ,
            'description=En'  => 'required|string'  ,
            'address=En'      => 'required'         ,   
            'locale=Ar'       => 'required|string'  ,
            'hotel_Name=Ar'   => 'required|string'  ,
            'description=Ar'  => 'required|string'  ,
            'address=Ar'      => 'required'   ,      
            // 'images'        => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]) ;
        // return $request;
        $Hotel = Hotel::find($id);

        $Hotel->country_id = $request->get('country_id');
        $Hotel->stars = $request->get('stars');
        $Hotel->city_id = $request->get('city_id');

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
