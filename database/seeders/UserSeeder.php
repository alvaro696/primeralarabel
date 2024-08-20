<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Alvaro',
                'email' => 'alvaro00.am@outlook.com',
                'email_verified_at' => '2024-08-08 08:00:00',
                'password' => 'alvaro',
                'remember_token' => 'alvaro',
            ],
            [
                'id' => 2,
                'name' => 'Gianella',
                'email' => 'gianella@gmail.com',
                'email_verified_at' => '2024-08-08 08:00:00',
                'password' => 'gianella',
                'remember_token' => 'gianella',
            ],
            [
                'id' => 3,
                'name' => 'Daniel',
                'email' => 'daniel@gmail.com',
                'email_verified_at' => '2024-08-08 08:00:00',
                'password' => 'daniel',
                'remember_token' => 'daniel',
            ],
        ]);
    }
}
