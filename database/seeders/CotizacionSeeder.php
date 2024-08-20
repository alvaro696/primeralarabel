<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cotizaciones')->insert([
            [
                'id_cotizacion' => 1,
                'id_cliente' => 1,
                'id_distrito' => 1,
                'id_estado' => 1,
                'id_ramo_tipo' => 1,
                'valor_asegurado' => 25000,
                'tasa' => 1.3,
                'prima' => 235.8,
                'f_cotizacion' => '2024-08-09',
            ],
            [
                'id_cotizacion' => 2,
                'id_cliente' => 1,
                'id_distrito' => 1,
                'id_estado' => 1,
                'id_ramo_tipo' => 2,
                'valor_asegurado' => 30000,
                'tasa' => 1.3,
                'prima' => 255,
                'f_cotizacion' => '2024-08-09',
            ],
            [
                'id_cotizacion' => 3,
                'id_cliente' => 2,
                'id_distrito' => 2,
                'id_estado' => 1,
                'id_ramo_tipo' => 1,
                'valor_asegurado' => 36000,
                'tasa' => 1.3,
                'prima' => 235.9,
                'f_cotizacion' => '2024-08-09',
            ],
            [
                'id_cotizacion' => 4,
                'id_cliente' => 3,
                'id_distrito' => 3,
                'id_estado' => 1,
                'id_ramo_tipo' => 3,
                'valor_asegurado' => 15000,
                'tasa' => 1.26,
                'prima' => 300,
                'f_cotizacion' => '2024-08-09',
            ],
        ]);
    }
}
