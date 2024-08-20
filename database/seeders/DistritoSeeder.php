<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('distritos')->insert([
            [
                'id_distrito' => 1,
                'distrito' => 'LA PAZ',
            ],
            [
                'id_distrito' => 2,
                'distrito' => 'COCHABAMBA',
            ],
            [
                'id_distrito' => 3,
                'distrito' => 'SANTA CRUZ',
            ],
            [
                'id_distrito' => 4,
                'distrito' => 'ORURO',
            ],
            [
                'id_distrito' => 5,
                'distrito' => 'POTOSI',
            ],
            [
                'id_distrito' => 6,
                'distrito' => 'CHUQUISACA',
            ],
            [
                'id_distrito' => 7,
                'distrito' => 'TARIJA',
            ],
            [
                'id_distrito' => 8,
                'distrito' => 'BENI',
            ],
            [
                'id_distrito' => 9,
                'distrito' => 'PANDO',
            ],
        ]);
    }
}
