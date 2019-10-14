<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\country;
use App\Localization;

class countriesController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = country::paginate(20);
        return view('dashboard/pages/countries',compact('countries'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/pages/Add_Country');
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
 
            'country_code'                 => 'required' ,
            'country_enName'                 => 'required' ,
            'country_arName'                 => 'required' ,

            ]) ;

        $country = new country();
        $country->country_code = $request->get('country_code');
        $country->country_enName = $request->get('country_enName');
        $country->country_arName = $request->get('country_arName');
        $country->save();

        return redirect(route('countries.index'))->with('success','Country Added');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = country::where('id',$id)->first();
        return view('dashboard/pages/Add_Country',compact('country'));
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
        $request->validate([
 
            'country_code'                 => 'max:2' ,

            ]) ;
        $country = country::find($id);
        $country->country_code = $request->get('country_code');
        $country->country_enName = $request->get('country_enName');
        $country->country_arName = $request->get('country_arName');
        $country->save();
       
        return redirect()->back()->with('success','Country Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = country::find($id);
        $country->delete();
    
      return redirect()->back()->with('success','Data Deeleted');
    }
}
