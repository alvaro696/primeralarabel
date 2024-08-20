<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ramos')->insert([
            [
                'id_ramo' => 1,
                'ramo' => 'AUTOMOTORES',
            ],
            [
                'id_ramo' => 2,
                'ramo' => 'INCENDIO',
            ],
            [
                'id_ramo' => 3,
                'ramo' => 'CAUCIONES',
            ],
        ]);
    }
}
