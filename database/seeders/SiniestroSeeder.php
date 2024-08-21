<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiniestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siniestros')->insert([
            [
                'id_siniestro' => 1,
                'id_poliza' => 2,
                'id_estado' => 3,
                'f_siniestro' => '2024-12-12',
                'f_denuncia' => '2024-12-13',
                'descripcion' => 'CHOQUE FRONTAL CONTRA ARBOL',
                'f_registro' => '2024-08-09',
            ],
            [
                'id_siniestro' => 2,
                'id_poliza' => 3,
                'id_estado' => 3,
                'f_siniestro' => '2024-10-10',
                'f_denuncia' => '2024-10-15',
                'descripcion' => 'SE ECNONTRABA ESTACIONADO Y OTRO AUTO IMPACTO LADO DERECHO',
                'f_registro' => '2024-08-09',
            ],
        ]);
    }
}
