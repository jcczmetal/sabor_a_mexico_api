<?php

namespace App\Http\Controllers\API\Eaters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class RestaurantsNearToController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //https://dev.to/parthp1808/how-to-find-nearby-places-using-latitude-and-longitude-in-laravel-5-4iih

        $addresses = Address::select(DB::raw('*, ( 6367 * acos( cos( radians('.$request->latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$request->longitude.') ) + sin( radians('.$request->latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))
                         ->having('distance', '<', 25)
                         ->orderBy('distance')
                         ->get();

        return $addresses;
    }
}
