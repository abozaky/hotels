<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localization;
use App\policies;


class policies_conditions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Localization::all();
        $policies =  policies::all();

        return view('dashboard/pages/policies_conditions',compact('languages','policies'));

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
        // return $request ;
           // validation data before insert data to db
        //    $request->validate([
 
        //     'locale=En'       => 'required|string'  ,
        //     'Privacy_Policy=En'   => 'required|string'  ,
        //     'Terms_And_Condition=En'  => 'required|string'  ,
        //     'Cancellation_Policy=En'      => 'required'         ,   
        //     'locale=Ar'       => 'required|string'  ,
        //     'Privacy_Policy=Ar'   => 'required|string'  ,
        //     'Terms_And_Condition=Ar'  => 'required|string'  ,
        //     'Cancellation_Policy=Ar'      => 'required'   ,      
        // ]) ;
        // insert data to Policies       
            $languages = Localization::all();
            foreach ($languages as $language) {

                $policies = new policies();
                $policies->locale = $request->get('locale='.$language->name);
                $policies->Privacy_Policy = $request->get('Privacy_Policy='.$language->name);
                $policies->Terms_And_Condition = $request->get('Terms_And_Condition='.$language->name);
                $policies->Cancellation_Policy = $request->get('Cancellation_Policy='.$language->name);
                $policies->save();            
            }
            return redirect()->back()->with('success','Policies Added');
        
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
        //         $request->validate([

        //     'locale=En'       => 'required|string'  ,
        //     'Privacy_Policy=En'   => 'required|string'  ,
        //     'Terms_And_Condition=En'  => 'required|string'  ,
        //     'Cancellation_Policy=En'      => 'required'         ,   
        //     'locale=Ar'       => 'required|string'  ,
        //     'Privacy_Policy=Ar'   => 'required|string'  ,
        //     'Terms_And_Condition=Ar'  => 'required|string'  ,
        //     'Cancellation_Policy=Ar'      => 'required'   ,      
        //  ]) ;

        $languages = Localization::all();
        foreach ($languages as $language) {

            $policies = policies::where('locale', $request->get('locale='.$language->name))->first();

            $policies->locale = $request->get('locale='.$language->name);
            $policies->Privacy_Policy = $request->get('Privacy_Policy='.$language->name);
            $policies->Terms_And_Condition = $request->get('Terms_And_Condition='.$language->name);
            $policies->Cancellation_Policy = $request->get('Cancellation_Policy='.$language->name);
            $policies->save();            
        }

        return redirect()->back()->with('success','Policies Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages = Localization::all();
        foreach ($languages as $language) {
            $policies = policies::where('locale', $language->name)->firstOrFail();
            $policies->delete();
        }
        return redirect()->back()->with('success','Data Deeleted');
    }
}