<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pagos')->insert([
            [
                'id_pago' => 1,
                'id_poliza' => 1,
                'id_estado' => 3,
                'cuota' => 0,
                'f_pago' => '2024-09-09',
                'monto' => 235.8,
            ],
            [
                'id_pago' => 2,
                'id_poliza' => 2,
                'id_estado' => 3,
                'cuota' => 0,
                'f_pago' => '2024-09-10',
                'monto' => 235.9,
            ],
            [
                'id_pago' => 3,
                'id_poliza' => 3,
                'id_estado' => 4,
                'cuota' => 1,
                'f_pago' => '2024-10-09',
                'monto' => 100,
            ],
            [
                'id_pago' => 4,
                'id_poliza' => 3,
                'id_estado' => 3,
                'cuota' => 2,
                'f_pago' => '2024-11-09',
                'monto' => 100,
            ],
            [
                'id_pago' => 5,
                'id_poliza' => 3,
                'id_estado' => 3,
                'cuota' => 3,
                'f_pago' => '2024-12-09',
                'monto' => 100,
            ],

        ]);
    }
}
