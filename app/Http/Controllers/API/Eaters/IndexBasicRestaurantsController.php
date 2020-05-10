<?php

namespace App\Http\Controllers\API\Eaters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class IndexBasicRestaurantsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //must have robust handle.
        return Restaurant::all();
    }
}
