<?php

namespace App\Http\Controllers\Addresses;

use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantsAddresesManagementController extends Controller
{
	public function index($slug)
	{
		$addresses = Restaurant::with('addresses')
							 ->whereSlug($slug)
							 ->first();

		return view('addresses/index', compact('addresses'));
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
