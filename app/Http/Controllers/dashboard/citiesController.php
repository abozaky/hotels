<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\city;

class citiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->get();
        return view('dashboard/pages/Cities',compact('cities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation data before insert data to db
        $request->validate([
 
            'city_enName'                 => 'required' ,
            'city_arName'                 => 'required' ,

            ]) ;

        $city = new city();
        $city->city_enName = $request->get('city_enName');
        $city->city_arName = $request->get('city_arName');
        $city->country_id = $request->get('country_id');
        $city->save();

        return redirect(route('cities.index'))->with('success','City Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/pages/Add_City',compact('id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = city::where('id',$id)->first();
        return view('dashboard/pages/Add_City',compact('city'));

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
        $city = city::find($id);
        $city->city_enName = $request->get('city_enName');
        $city->city_arName = $request->get('city_arName');
        $city->save();

        return redirect()->back()->with('success','City Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = city::find($id);
        $city->delete();
    
      return redirect()->back()->with('success','Data Deeleted');
    }
}
