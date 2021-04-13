<?php

use Illuminate\Http\Request;

/*
    - WEBAPP -> Alv android . iOS
    - Restful API

    -> subdominio . fondaswebapp.sistemasramirez.com ->
                    fondasapi.sistemasramirez.com

========================================================= Infra y arquitectura

- Revisar tema de wireframes y checar lo que es más fácil: web vs app movil

- JWT -> Cookies

- Analytics para ver de donde entran y que tanto tráfico hay.

    -> FOTOS: ver tamaños necesarios ->


    -> Comensales
        -> Recibir restaurantes cercanos -> el calculo que ya tenemos de cercanía
        -> Poder ver un restaurante -> fotos, menú, contacto

    -> Restaurantes
        -> Que se registren -> crear un perfil de restaurantero (datos de contacto entre ellos y nosotros y comensales)
                            -> subir fotos del restaurante (hasta 3)
                            -> configuren lo básico del restaurante
                            -> crear sucursal (ubicación)
                            -> menu (por el momento el menú completo uno solo) (solo texto) *
                                -> platillos? (items del menú) nombre, descripción, precio, tipo, foto.

    -> Administradores
        -> Validar las solicitudes de registro de restaurantes
        -> Moderar las fotos (poder eliminar fotos manualmente)


    ->
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
});

