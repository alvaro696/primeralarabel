<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemMarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_marcas')->insert([
            [
                'id_item_marca' => 1,
                'item_marca' => 'TOYOTA',
                'tipo' => 'AUTOMOTORES',
            ],
            [
                'id_item_marca' => 2,
                'item_marca' => 'NISSAN',
                'tipo' => 'AUTOMOTORES',
            ],
            [
                'id_item_marca' => 3,
                'item_marca' => 'SUZUKI',
                'tipo' => 'AUTOMOTORES',
            ],
        ]);
    }
}
