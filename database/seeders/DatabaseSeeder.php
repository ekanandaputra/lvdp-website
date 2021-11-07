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
        	'name' => 'User Demo',
        	'username' => 'demo',
            'password'	=> bcrypt('demo')
        ]);

        DB::table('devices')->insert([
        	'uuid' => '1111',
            'location' => 'Gedung AJ LT 1',
            'user_id' => 1,
            'description' => 'Perangkat Untuk Demo'      
        ]);

        DB::table('devices')->insert([
        	'uuid' => '1112',
            'location' => 'Gedung AJ LT 2',
            'user_id' => 1,
            'description' => 'Perangkat Untuk Demo'      
        ]);

        DB::table('devices')->insert([
        	'uuid' => '1113',
            'location' => 'Gedung AH',
            'user_id' => 1,
            'description' => 'Perangkat Untuk Demo'      
        ]);

        DB::table('devices')->insert([
        	'uuid' => '1113',
            'location' => 'Gedung AG',
            'user_id' => 1,
            'description' => 'Perangkat Untuk Demo'      
        ]);

    }
}
