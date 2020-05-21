<?php

namespace App\Http\Controllers\Restaurants;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\Restaurants\CreateRestaurant;
use App\Http\Controllers\Controller;

class RestaurantsManagementController extends Controller
{
	public function index()
	{
		//Keymakers		 -> Mostrar todos los restaurantes.
		//Administrators -> Mostrar todos los restaurantes.

		$userRole = auth()->user()->getRoleNames()->first();

		if($userRole == 'keymaker' || $userRole == 'admin') {
			$restaurants = Restaurant::where('active', true)->get();

			return view('restaurants.index',compact('restaurants'));
		}

		//Associate		-> Mostrar los restaurantes que han generado o que se le han asignado.
		if(auth()->user()->hasRole('associate')) {
			return "hello associate";
		}
	}

	public function store(CreateRestaurant $request)
	{
		//modificar
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->newrestaurant_name), '-')) . rand(1000,9999);

        $newRestaurant = Restaurant::create([
        	'name'		=> $request->newrestaurant_name,
        	'slug'		=> $slug,
			'website'	=> $request->newrestaurant_website,
			'email'		=> $request->newrestaurant_email,
			'active'	=> false
        ]);

        /*
        if(auth()->user()->hasRole('associate')) {
        	//necesitamos asociar el restaurante creado con el asociado que lo crea.
        	//tendremos otro controlador que se encargará exclusivamente de asociar restaurant y asociado.
        }
        */

        return response()->json(
            $newRestaurant->slug,
            200
        );
	}

	public function show($slug)
	{
		$restaurant = Restaurant::withCount('addresses')
								->where('slug', $slug)
								->first();

		return view('restaurants.show',compact('restaurant'));
	}

	public function update(Request $request, $id)
	{

	}
}
