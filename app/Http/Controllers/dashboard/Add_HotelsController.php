<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localization;
use App\country;
use App\Hotel;
use App\HotelTranslation;

class Add_HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Localization::all();
        $countries = country::all();
        
        return view('dashboard/pages/add_hotel',compact('languages','countries'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request ;
        
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

        // return $_FILES["images"];
        $hotel = new Hotel();

        // query to add multiple files and check before add
        if( $request->hasfile('images') )
        {
           foreach( $request->file('images') as $image )
           {
            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('hotel_Images'), $imageName);
            $data[] = $imageName;  
            $hotel->photos = json_encode($data);
           }
        }else{
                $hotel->photos = '';
             }
        // insert data to hotel table and get Hotel ID to used it to hotel_translation table
            $hotel->stars = $request->get('stars');
            $hotel->country_id = $request->get('country_id');
            $hotel->city_id = $request->get('city_id');
            
            $hotel->save();
            $currentId = $hotel->id;
        // insert data to hotel_translation by Hotel_id 
            
            $languages = Localization::all();
            foreach ($languages as $language) {

                $HotelTranslation = new HotelTranslation();
                $HotelTranslation->locale = $request->get('locale='.$language->name);
                $HotelTranslation->name = $request->get('hotel_Name='.$language->name);
                $HotelTranslation->description = $request->get('description='.$language->name);
                $HotelTranslation->address = $request->get('address='.$language->name);
                $HotelTranslation->hotel_id = $currentId;
                $HotelTranslation->save();
            
            }
            return redirect()->back()->with('success','Hotel Added');

    }
    
  
    public function ajaxCities($id)

    {
        $cities = city::where('country_id',$id)->get();
        return response()->json(['cities'=>$cities]);

    }
}
