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
    	$roles = array("keymaker","admin","associate");

        factory('App\User', 10)->create()->each(function($user, $roles){
        	$user->assignRole($roles[array_rand($roles)]);
        });
    }
}
