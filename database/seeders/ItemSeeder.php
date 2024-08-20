<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'id_item' => 1,
                'id_poliza' => 1,
                'id_estado' => 1,
                'placa' => '1234ABC',
                'clase' => 'VAGONETA',
                'marca' => 'TOYOTA',
                'modelo' => 'IPSUM',
                'uso' => 'PUBLICO',
                'color' => 'AZUL OSCURO',
                'foto_frontal' => 'ruta1',
                'foto_lateral' => 'ruta2',
                'foto_trasera' => 'ruta3',
            ],
            [
                'id_item' => 2,
                'id_poliza' => 2,
                'id_estado' => 1,
                'placa' => '4321GAS',
                'clase' => 'VAGONETA',
                'marca' => 'SUZUKI',
                'modelo' => 'RETRO',
                'uso' => 'PARTICULAR',
                'color' => 'AZUL',
                'foto_frontal' => 'ruta1',
                'foto_lateral' => 'ruta2',
                'foto_trasera' => 'ruta3',
            ],
            [
                'id_item' => 3,
                'id_poliza' => 3,
                'id_estado' => 1,
                'placa' => '5435DAC',
                'clase' => 'MINUBUS',
                'marca' => 'NISSAN',
                'modelo' => 'TREC',
                'uso' => 'PUBLICO',
                'color' => 'BLANCO',
                'foto_frontal' => 'ruta1',
                'foto_lateral' => 'ruta2',
                'foto_trasera' => 'ruta3',
            ],
        ]);
    }
}
