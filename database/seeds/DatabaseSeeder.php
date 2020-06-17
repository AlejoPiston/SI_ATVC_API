<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            //UserSeeder::class,
            ZonaSeeder::class,
            ServicioSeeder::class,
            ValorAdicionalSeeder::class,
            FichaSeeder::class,
            MaterialInstalacionSeeder::class,
            MensualidadSeeder::class,
            UsuarioSeeder::class,
            GastoSeeder::class,
            OtroIngresoSeeder::class,
            CierreCajaSeeder::class,
            CobroSeeder::class,
            RetencionSeeder::class,
            CobroMensualidadSeeder::class,
            CompromisoPagoSeeder::class,
        ]);
    }
}
