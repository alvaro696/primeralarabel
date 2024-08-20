<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RamoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ramo_tipos')->insert([
            [
                'id_ramo_tipo' => 1,
                'ramo_tipo' => 'AUTOMOTORES-IND',
                'id_ramo' => 1,
            ],
            [
                'id_ramo_tipo' => 2,
                'ramo_tipo' => 'AUTOMOTORES-GRUP',
                'id_ramo' => 1,
            ],
            [
                'id_ramo_tipo' => 3,
                'ramo_tipo' => 'INCENDIO',
                'id_ramo' => 2,
            ],
            [
                'id_ramo_tipo' => 4,
                'ramo_tipo' => 'TRDP',
                'id_ramo' => 2,
            ],
            [
                'id_ramo_tipo' => 5,
                'ramo_tipo' => 'ADUANERAS',
                'id_ramo' => 3,
            ],
        ]);
    }
}
