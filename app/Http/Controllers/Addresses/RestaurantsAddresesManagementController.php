<?php

namespace App\Http\Controllers\Addresses;

use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class RestaurantsAddresesManagementController extends Controller
{
	public function index($slug)
	{
		$addresses = Address::whereHas('restaurant',function(Builder $query) use($slug){
                                            $query->whereSlug($slug);
                                       })
							  ->get();

		return view('addresses.index', compact('addresses'));
	}

	public function create()
	{
		return view('addresses.create');
	}

	public function store(Request $request)
	{

	}

	public function update(Request $request, $id)
	{

	}

	public function destroy($id)
	{

	}
}
