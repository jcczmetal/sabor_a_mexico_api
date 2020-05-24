<?php

namespace App\Http\Controllers\Addresses;

use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Addresses\AddressRegister;

class RestaurantsAddresesManagementController extends Controller
{
	public function index($slug)
	{
		$addresses = Address::with('restaurant')
							->whereHas('restaurant',function(Builder $query) use($slug){
                                            $query->whereSlug($slug);
                                       })
							->get();

		return view('addresses.index', compact('addresses','slug'));
	}

	public function create($slug)
	{
		return view('addresses.create',compact('slug'));
	}

	public function show($slug)
	{
		$address = Address::with('restaurant','reviews')
							->whereSlug($slug)
							->first();

		$addressMediaItems = $address->getMedia();

		return view('addresses.show', compact('address'));
	}

	public function store(AddressRegister $request)
	{
		$restaurant = Restaurant::whereSlug($request->slug)->select('id')->first();

		if (!$restaurant) {
			return "Error. Enviar respuesta JSON";
		}

		$newAddress = Address::create([
			'restaurant_id' => $restaurant->id,
			'branch'		=> $request->branch,
			'slug'			=> $request->slug,
			'street'		=> $request->street,
			'phone'			=> $request->phone,
			'number'		=> $request->number,
			'city'			=> $request->city,
			'state'         => $request->state,
			'latitude'      => $request->lat,
			'longitude'     => $request->lng
		]);

		return response()->json(
            ['success'],
            200
        );
	}

	public function update(AddressRegister $request, $id)
	{

	}

	public function destroy($id)
	{
		//Soft delete que permita
	}
}
