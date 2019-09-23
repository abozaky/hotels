<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function() {

		Route::resource('/index', 'dashboard\indexController');
		Route::resource('/hotels', 'dashboard\HotelsController');
		Route::resource('/Add_New_Hotel', 'dashboard\Add_HotelsController');
		

	});

Route::get('/home', 'HomeController@index')->name('home');


