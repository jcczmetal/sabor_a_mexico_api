<?php

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Restaurant', 10)->create()->each(function($restaurant){
        	$restaurant->addresses()->save(factory(App\Models\Address::class)->make());
        });
    }
}
