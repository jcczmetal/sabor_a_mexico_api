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
		$addresses = Address::whereHas('restaurant',function(Builder $query) use($slug){
                                            $query->whereSlug($slug);
                                       })
							  ->get();

		return view('addresses.index', compact('addresses','slug'));
	}

	public function create($slug)
	{
		$restaurant = Restaurant::whereSlug($slug)
							    ->select('id')
							    ->first();

		return view('addresses.create',compact('restaurant'));
	}

	public function store(AddressRegister $request)
	{

	}

	public function update(AddressRegister $request, $id)
	{

	}

	public function destroy($id)
	{
		//Soft delete que permita
	}
}
