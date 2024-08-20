<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolizaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('polizas')->insert([
            [
                'id_poliza' => 1,
                'id_cotizacion' => 1,
                'id_estado' => 1,
                'cod_poliza' => 'AULP0000101',
                'f_ini' => '2024-08-09',
                'f_fin' => '2025-08-09',
                'tipo_pago' => 'CONTADO',
                'f_registro' => '2024-08-09',
            ],
            [
                'id_poliza' => 2,
                'id_cotizacion' => 3,
                'id_estado' => 1,
                'cod_poliza' => 'AULP0000102',
                'f_ini' => '2024-08-10',
                'f_fin' => '2025-08-10',
                'tipo_pago' => 'CONTADO',
                'f_registro' => '2024-08-09',
            ],
            [
                'id_poliza' => 3,
                'id_cotizacion' => 4,
                'id_estado' => 1,
                'cod_poliza' => 'AULP0000103',
                'f_ini' => '2024-09-09',
                'f_fin' => '2025-09-09',
                'tipo_pago' => 'CREDITO',
                'f_registro' => '2024-08-09',
            ],
        ]);
    }
}
