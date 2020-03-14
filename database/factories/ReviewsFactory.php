<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Review;
use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
            'user_id'       => factory(User::class),
            'restaurant_id' => factory(Restaurant::class),
            'review'        => $faker->text(200),
            'visit_type'    => $faker->randomElement(array ('solo','business','couples','family','friends')),
            'ranking'       => $faker->randomElement(array ('1','2','3','4','5','6','7','8','9','10'))
    ];
});
