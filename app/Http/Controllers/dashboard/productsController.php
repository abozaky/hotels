<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Carbon\Carbon;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::all();
         $categories = Category::All();
        return view('dashboard/pages/products',compact('products','categories'));
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
        $request->validate([
                             'ProductName' => 'required|max:50|string',
                             'prcie' => 'required|numeric',
                             'Quantity' => 'required|numeric',
                             'is_offer' => 'required|numeric',
                             // 'Offer' => 'required|numeric',
                             // 'expire_offer' => 'required|date_format:Y-m-d|after:today',
                             'Category' => 'required|numeric',     
                             'description' => 'required|max:100',
                             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);

        $timestamp = Carbon::now();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Africa/Cairo');
        
        $product = new Product();
        $product->name = $request->input('ProductName');
        $product->price = $request->input('prcie');
        $product->Quantity = $request->input('Quantity');
        $product->is_offer = $request->input('is_offer');
        $product->offer = $request->input('Offer');
        
        $expire_offer = $request->input('expire_offer') == null ? null : $date->now()->addDays($request->input('expire_offer'));

        $product->expire_offer = $expire_offer;

        $product->category_id = $request->input('Category');
        $product->description = $request->input('description');

        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('Products_Image'), $imageName);
            $product->photo = $imageName;
        }else{

            $product->photo = '';
        }

        $product->save();
        
        return redirect('/dashboard/products')->with('success','Product added');
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
        $request->validate([
                             'ProductName' => 'required|max:50|string',
                             'prcie' => 'required|numeric',
                             'Quantity' => 'required|numeric',
                             'selling' => 'required|numeric',
                             'is_offer' => 'required|numeric',
                             // 'Offer' => 'required|numeric',
                             // 'expire_offer' => 'required|date_format:Y-m-d|after:today',
                             'Category' => 'required|numeric',     
                             'description' => 'required|max:100',
                             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);



      

          $timestamp = Carbon::now();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Africa/Cairo');
       
        $product = Product::find($id);
        $product->name = $request->input('ProductName');
        $product->price = $request->input('prcie');
        $product->Quantity = $request->input('Quantity');
        $product->selling = $request->input('selling');
        $product->is_offer = $request->input('is_offer');
        $product->offer = $request->input('Offer');
        
        $expire_offer = $request->input('expire_offer') == null ? null : $date->now()->addDays($request->input('expire_offer'));

        $product->expire_offer = $expire_offer;

        $product->category_id = $request->input('Category');
        $product->description = $request->input('description');

        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('Products_Image'), $imageName);
            $product->photo = $imageName;
        }else{

            $product->photo = '';
        }

        $product->save();
        
        return redirect('/dashboard/products')->with('success','Product Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);       
        $Product->delete();
        return redirect()->back()->with('success','Producte Deeleted');
    }
}
