<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

	$addressSlug = $faker->name;
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $addressSlug), '-'))  . rand(1000,9999);

    return [
		'restaurant_id' => factory(Restaurant::class),
		'branch'   		=> $faker->name,
		'slug'			=> $slug,
		'street'		=> $faker->streetName,
		'number'		=> $faker->numerify($string = '###'),
		'phone'		    => $faker->numerify($string = '##########'),
		'city'			=> 'Mérida',
		'state'			=> 'Yucatán',
		'latitude'		=> $faker->latitude($min = 20, $max = 21),
		'longitude'		=> $faker->longitude($min = -89, $max = -90)
    ];
});
