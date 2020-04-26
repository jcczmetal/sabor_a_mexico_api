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

Route::get('/user', function (Request $request) {
    return "hello";
});

//middleware(['auth','role:keymaker'])->
Route::namespace('API')->group(function(){
	Route::namespace('Eaters')->group(function(){
		Route::get('restaurants', 'RestaurantsController@index');
	});
});

