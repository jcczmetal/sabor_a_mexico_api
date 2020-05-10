<?php

namespace App\Http\Controllers\API\Eaters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantWithAddressController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $restaurant = Restaurant::with('addresses')->find($id);

        return $restaurant;
    }
}
