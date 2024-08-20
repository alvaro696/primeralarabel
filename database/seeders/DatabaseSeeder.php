<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RamosSeeder::class,
            RamoTipoSeeder::class,
            DistritoSeeder::class,
            EstadoSeeder::class,
            ItemMarcaSeeder::class,
            UserSeeder::class,
            ClienteSeeder::class,
            CotizacionSeeder::class,
            PolizaSeeder::class,
            PagoSeeder::class,
            SiniestroSeeder::class,
            SiniestroDetalleSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
