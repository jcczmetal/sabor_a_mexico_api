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
        $newRestaurant = Restaurant::create([
        	'name'		=> $request->newrest_name,
			'slug'		=> $request->newrest_slug,
			'website'	=> $request->newrest_website,
			'phone'		=> $request->newrest_phone,
			'email'		=> $request->newrest_email,
			'active'	=> true,
			'address'	=> $request->newrest_address,
			'latitude'	=> $request->newrest_latitude,
			'longitude'	=> $request->newrest_longitude
        ]);

        /*
        if(auth()->user()->hasRole('associate')) {
        	//necesitamos asociar el restaurante creado con el asociado que lo crea.
        	//tendremos otro controlador que se encargará exclusivamente de asociar restaurant y asociado.
        }
        */

        return response()->json(
            ['success'],
            200
        );
	}

	public function show($slug)
	{
		$restaurant = Restaurant::where('slug', $slug)->first();

		return view('restaurants.show',compact('restaurant'));
	}

	public function update(Request $request, $id)
	{

	}
}
