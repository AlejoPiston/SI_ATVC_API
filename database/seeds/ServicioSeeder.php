<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Servicio::class, 10)->create();    
    }
}
