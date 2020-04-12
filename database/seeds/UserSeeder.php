<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 2)->create()->each(function($user){
        	$user->assignRole('keymaker');
        });

        factory('App\User', 4)->create()->each(function($user){
            $user->assignRole('admin');
        });

        factory('App\User', 6)->create()->each(function($user){
            $user->assignRole('associate');
        });

        factory('App\User', 10)->create()->each(function($user){
            $user->assignRole('eater');
        });
    }
}
