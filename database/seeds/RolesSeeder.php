<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Role::create(['name' => 'keymaker']);
		Role::create(['name' => 'admin']);
		Role::create(['name' => 'associate']);
		Role::create(['name' => 'eater']);
    }
}
