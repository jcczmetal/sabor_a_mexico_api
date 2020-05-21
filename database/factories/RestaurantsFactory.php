<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {

	$restaurantName = $faker->name;
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $restaurantName), '-'));
	$website = 'www.'.$slug.'.com';

    return [
        'name'      => $restaurantName,
        'slug'      => $slug,
        'website'   => $website,
        'email'     => $faker->safeEmail,
        'active'    => 1
    ];
});
