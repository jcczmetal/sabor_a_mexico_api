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

Route::namespace('API')->group(function(){
	Route::namespace('Eaters')->group(function(){
		// Sólo información básica de todos los restaurantes debe ir paginado.
		Route::get('restaurants', 							'RestaurantsController');

		// (Restaurante + dirección) por ciudad paginado ¿Necesitamos fotografía principal? yo creo que sí
		Route::get('restaurants/{city}',					'CityRestaurantsController');

		// Se envía la posición para consultar las direcciones más cercanas... ¿Cómo?
		//envío de coordenadas -> rango de cercanía ->
		Route::post('restaurants/near-to',					'RestaurantsNearToController');

		// Sólo información básica de un restaurante
		Route::get('restaurant/{id}/basic', 				'SingleRestaurantController');

		// Restaurante + direcciones
		Route::get('restaurant/{id}/addresses',				'RestaurantWithAddressController');

		// Restaurante + direcciones + fotografías + reviews
		//Route::get('restaurant/{id}/full',					'ShowFullRestaurantProfileController');

		// Restaurante + dirección específica + fotografías específicas de la dirección -> la consulta va sobre la dirección
		//Route::get('restaurant/address/{id}/photos',		'ShowPhotosAddressRestaurantController');

		// Restaurante + dirección específica + fotografías + reviews -> la consulta va sobre la dirección
		//Route::get('restaurant/address/{id}/profile',		'ShowPhotosAddressRestaurantController');

		// Roles y permisos ->
		// Reviews -> Backend - User
		// photos  -> Backend - User
		// address -> Backend

		// DEMO delimitar + documentación
			// Arquitectura + Infraestructura (demanda[''] -> 100k requests)


	});
});

