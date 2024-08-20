<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([

            [
                'id_estado' => 1,
                'estado' => 'ACTIVO',
            ],
            [
                'id_estado' => 2,
                'estado' => 'INACTIVO',
            ],
            [
                'id_estado' => 3,
                'estado' => 'PENDIENTE',
            ],
            [
                'id_estado' => 4,
                'estado' => 'PAGADO',
            ],
            [
                'id_estado' => 99,
                'estado' => 'ELIMINADO',
            ],
        ]);
    }
}
