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
    Route::post('/password/email', 'api\ForgotPasswordController@getResetToken');
    Route::post('password/reset', 'api\ResetPasswordController@reset');

});




Route::post('/searchhotels','api\SearchAndFilterController@hotelsSearchAndFilter' );

Route::post('/hotelsfilter','api\SearchAndFilterController@hotelsSearchAndFilter' );

Route::post('/hotels','api\SearchAndFilterController@hotelsSearchAndFilter' );

Route::post('/hotel','api\HotelController@hotel');

Route::post('/booknow','api\booknowController@bookNow')->middleware('auth:api');



