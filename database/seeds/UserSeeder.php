<?php

use App\User;
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
        $julio = User::create([
            'first_name'        => 'Julio',
            'last_name'         => 'Ramirez',
            'email'             => 'juliora@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('patito123'),
            'remember_token'    => Str::random(10),
        ]);

        $julio->assignRole('keymaker');

        $carlos = User::create([
            'first_name'        => 'Carlos',
            'last_name'         => 'Rodriguez',
            'email'             => 'carlosro@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('patito123'),
            'remember_token'    => Str::random(10),
        ]);

        $carlos->assignRole('keymaker');

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
