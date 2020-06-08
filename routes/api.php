<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});



Route::middleware('auth:sanctum')->namespace('API')->group(function(){
	Route::namespace('Eaters')->group(function(){
		// Sólo información básica de todos los restaurantes debe ir paginado.
		Route::get('restaurants', 							'RestaurantsController');

		// (Restaurante + dirección) por ciudad paginado ¿Necesitamos fotografía principal? yo creo que sí
		Route::get('restaurants/{city}',					'CityRestaurantsController');

		// Se envía la posición para consultar las direcciones más cercanas... ¿Cómo?
		//envío de coordenadas -> rango de cercanía ->
		Route::post('restaurants/near-to',					'RestaurantsNearToController');

		// Sólo información básica de un restaurante (Sucursal)
		Route::get('branch/{id}/basic', 					'SingleRestaurantController');

		// Restaurante + direcciones
		Route::get('restaurant/{id}/addresses',				'RestaurantWithAddressController');

		// Restaurante + direcciones + fotografías + reviews
		//Route::get('restaurant/{id}/full',					'ShowFullRestaurantProfileController');

		// Restaurante + dirección específica + fotografías específicas de la dirección -> la consulta va sobre la dirección
		//Route::get('restaurant/address/{id}/photos',		'ShowPhotosAddressRestaurantController');

		// Restaurante + dirección específica + fotografías + reviews -> la consulta va sobre la dirección
		//Route::get('restaurant/address/{id}/profile',		'ShowPhotosAddressRestaurantController');

		// Crear una review de una dirección de restaurante
		//Route::post('address/{id}/create-review',			'RestaurantPostReviewController');

		// Editar una review de una dirección de restaurante
		//Route::patch('review/{id}/update-review',			'RestaurantUpdateReviewController');

		//Eliminar una review
		//Route::delete('review/{id}/delete',					'RestaurantDeleteReviewController');

		//

		// Roles y permisos ->
		// Reviews -> Backend - User
		// photos  -> Backend - User
		// address -> Backend

		// DEMO delimitar + documentación
			// Arquitectura + Infraestructura (demanda[''] -> 100k requests)
	});

	//middleware(['role:keymaker'])->
	Route::namespace('Keymakers')->group(function(){
		Route::get('keymakers/dashboard', 'KeymakersDashboardController');
	});
});

