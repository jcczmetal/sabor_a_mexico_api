<?php

namespace App\Http\Controllers\Restaurants;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantsManagementController extends Controller
{
	public function index()
	{
		//Keymakers		 -> Mostrar todos los restaurantes.
		//Administrators -> Mostrar todos los restaurantes.
		if(auth()->user()->HasRole('keymaker') || auth()->user()->HasRole('admin')) {
			Restaurant::where('status','active')->get();
		}

		//Associate		-> Mostrar los restaurantes que han generado o que se le han asignado.
		if(auth()->user()->HasRole('associate')) {

		}
	}
}
