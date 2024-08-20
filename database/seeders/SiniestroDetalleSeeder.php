<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiniestroDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siniestros_detalles')->insert([
            [
                'id_siniestro_detalle' => 1,
                'id_siniestro' => 2,
                'ruta' => 'ruta/carpeta/archivo.img',
                'tipo_archivo' => 'imagen',
            ],
            [
                'id_siniestro_detalle' => 2,
                'id_siniestro' => 2,
                'ruta' => 'ruta/carpeta/archivo.pdf',
                'tipo_archivo' => 'pdf',
            ],
        ]);
    }
}
