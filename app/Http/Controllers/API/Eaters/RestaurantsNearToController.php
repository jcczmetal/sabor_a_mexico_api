<?php

namespace App\Http\Controllers\API\Eaters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;


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

        $addresses = Address::with('restaurant')
                            ->nearTo($request->latitude, $request->longitude)
                            ->get();

        return $addresses->map(function($address){
            $urls = $address->getMedia('images')->map(function($item) {
                return [
                    'thumb' => $item->getUrl('thumb-mobile'),
                    'cover' => $item->getUrl('cover-mobile')
                ];
            });

            return Arr::add($address, 'images', $urls);
        });

    }
}
