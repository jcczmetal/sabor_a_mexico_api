<?php

namespace App\Http\Controllers\API\Eaters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;

class CityRestaurantsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $city)
    {
        $cityRestaurants = Restaurant::with('addresses')
                                     ->whereHas('addresses', function(Builder $query) use($city){
                                            $query->where('city', $city);
                                       })
                                     ->select('id','name')
                                     ->get();

        return $cityRestaurants;
    }
}
