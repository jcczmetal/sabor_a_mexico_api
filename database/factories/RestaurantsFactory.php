<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'slug'      => $faker->slug,
        'website'   => $faker->url,
        'phone'     => $faker->numerify($string = '##########'),
        'email'     => $faker->safeEmail,
        'active'    => 1
    ];
});
