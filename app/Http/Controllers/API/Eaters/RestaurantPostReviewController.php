<?php

namespace App\Http\Controllers\API\Eaters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\Reviews\ReviewRegister;

class RestaurantPostReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ReviewRegister $request)
    {
        $newReview = Review::create([
            'user_id'       => $request->user_id,
            'address_id'    => $request->address_id,
            'review'        => $request->review,
            'visit_type'    => $request->visit_type,
            'ranking'       => $request->ranking
        ]);
    }
}
