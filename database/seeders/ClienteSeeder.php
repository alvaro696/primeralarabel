<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'id_cliente' => 1,
                'id' => 1,
                'nombres' => 'Alvaro',
                'primer_apellido' => 'Mamani',
                'segundo_apellido' => 'Arhuata',
                'nro_documento' => '9199713',
                'direccion' => 'Calle Final COlombia 846 Dep 3B',
                'celular' => 61108270,
                'f_registro' => '2024-08-09',
            ],
            [
                'id_cliente' => 2,
                'id' => 2,
                'nombres' => 'Gianella Ariadna',
                'primer_apellido' => 'Velez',
                'segundo_apellido' => 'Zambrana',
                'nro_documento' => '7050676',
                'direccion' => 'Calle 17 de Obrajes Bella Vista',
                'celular' => 75313174,
                'f_registro' => '2024-08-09',
            ],
            [
                'id_cliente' => 3,
                'id' => 3,
                'nombres' => 'Daniel',
                'primer_apellido' => 'Filth',
                'segundo_apellido' => '',
                'nro_documento' => '2461355',
                'direccion' => 'Inglaterra Calle 300 mil',
                'celular' => 6584342,
                'f_registro' => '2024-08-10',
            ],
        ]);
    }
}
