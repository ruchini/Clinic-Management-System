<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a default user
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('1234567'),
        ]);
    }
}

