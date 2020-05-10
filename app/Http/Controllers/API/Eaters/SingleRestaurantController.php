<?php

namespace App\Http\Controllers\API\Eaters;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingleRestaurantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return $restaurant;
    }
}
