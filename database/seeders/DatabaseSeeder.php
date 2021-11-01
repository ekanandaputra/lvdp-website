<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
        	'name' => 'putra',
        	'username' => 'putra',
            'password'	=> bcrypt('putra')
        ]);

        DB::table('devices')->insert([
        	'uuid' => 'a012201d',
            'location' => 'Gedung AJ LT 1',
            'description' => 'Perangkat Untuk Demo'      
        ]);

    }
}
