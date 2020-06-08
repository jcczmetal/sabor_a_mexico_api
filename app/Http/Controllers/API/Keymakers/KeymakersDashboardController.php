<?php

namespace App\Http\Controllers\API\Keymakers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeymakersDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            "data" => "hello"
        ],204);
    }
}
