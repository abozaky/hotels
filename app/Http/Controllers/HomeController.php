<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

      /**
     * this functionn to search in cities table by country id (ajax) used in add_newHotel page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ajaxCities($id)
    {
        $cities = city::where('country_id',$id)->get();
        return response()->json(['cities'=>$cities]);

    }

}
