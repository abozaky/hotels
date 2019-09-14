<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Categories = Category::all();
        return view('dashboard/pages/categories',compact('Categories'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // first validation
       
        // return $request;
        $request->validate(['name' => 'required',
                             'description' => 'required|max:100',
                             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);

        
        $Category = new Category();
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');

        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('Categories_Image'), $imageName);
            $Category->photo = $imageName;
        }else{

            $Category->photo = '';
        }

        $Category->save();
        
        return redirect('/dashboard/categories')->with('success','Category added');
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
        
        $request->validate(['name' => 'required',
                             'description' => 'required|max:100',
                             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);


        $Category = Category::find($id);
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');

        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('Categories_Image'), $imageName);
            $Category->photo = $imageName;
        }else{

            $Category->photo = '';
        }

        $Category->save();
        
        return redirect('/dashboard/categories')->with('success','Category Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);       
        $Category->delete();
        return redirect()->back()->with('success','Categoy Deeleted');
    }
}
