<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;

class hotelPhotosController extends Controller
{
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Hotels = Hotel::where('id',$id)->first();
       return view('dashboard/pages/hotel_photos',compact('Hotels'));
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
         // return $request;
       
         $old_photos = ($request->get('old_photos') == null)? [] :json_decode($request->get('old_photos'));
        
         $Hotel = Hotel::find($id);
         // query to Edit multiple files and add more image (array_push in old data in database)
         if( $request->hasfile('images') )
         {
              foreach( $request->file('images') as $image )
              {
               $imageName = time().'.'.$image->getClientOriginalName();
               $image->move(public_path('hotel_Images'), $imageName);
                array_push($old_photos,$imageName) ;  
             }
         }
         $Hotel->photos = json_encode($old_photos);
         $Hotel->save();
         return redirect()->back()->with('success','Photos Updated');
    }

    /**
     * Remove the specified image from hotel photos array by update.
     * search in array by value and get key then delete key
     * normaliz keys for array by function (array_value)
     * convert array to string and update this hotel by id 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteImage($id,$imagename)
    {
        // return $imagename;
        $Hotel = Hotel::find($id);
        $photos_arr = json_decode($Hotel->photos);
        $pos = array_search($imagename, $photos_arr);
        unset($photos_arr[$pos]);
        $photos_arr_key_normalize  =  array_values($photos_arr);
        $Hotel->photos = json_encode($photos_arr_key_normalize);
        $Hotel->save();

        return redirect()->back()->with('success','Image Deeleted');
    }


}
