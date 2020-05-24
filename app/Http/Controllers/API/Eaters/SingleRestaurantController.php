<?php

namespace App\Http\Controllers\API\Eaters;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Arr;

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
        $branch = Address::with('Restaurant')
                         ->findOrFail($id);

        $urls = $branch->getMedia('images')->map(function($item) {
                    return [
                        'thumb' => $item->getUrl('thumb-mobile'),
                        'cover' => $item->getUrl('cover-mobile')
                    ];
                });

        return Arr::add($branch, 'images', $urls);
    }
}
