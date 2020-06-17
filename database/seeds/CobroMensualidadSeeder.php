<?php

use Illuminate\Database\Seeder;
use App\CobroMensualidad;

class CobroMensualidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CobroMensualidad::class, 10)->create();    

    }
}
