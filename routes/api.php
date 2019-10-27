<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    // login with facebook by laravel/socialite package
    Route::get('/redirect/{provider}', 'Auth\SocialController@redirect');
    Route::get('/callback/{provider}', 'Auth\SocialController@callback');
    // end login by facebook


});



Route::get('/', function () {
    return ['SearchByCityAndCheckin'=>url('api/searchhotels'),
            'AllHotels'=>url('api/hotels'),
            'HotelsFilter'=>url('api/hotelsfilter'),
        
          ];
});


Route::get('/searchhotels','api\SearchController@index' );
Route::get('/hotelsfilter','api\HotelsFilterController@index' );
Route::get('/hotels','api\AllHotelsController@index' );

// Route::get('/categories','api\CategoryController@index' );

// Route::get('/products','api\ProductController@index' );

// Route::get('/BestSelling','api\ProductController@BestSelling' );

// Route::get('/products/{catId}','api\ProductController@show_pro' );
// Route::get('/product/{id}','api\ProductController@show' );

// Route::get('/orders/{userId}','api\OrderController@index');
// Route::get('/order/{id}','api\OrderController@show');


// Route::get('/cart/{pid}','api\ProductController@store')->middleware('auth:api');
// Route::delete('/cart/delete/{pavoitId}','api\ProductController@destroy')->middleware('auth:api');
// Route::get('/showcart/{userId}','api\ProductController@showcart')->middleware('auth:api');