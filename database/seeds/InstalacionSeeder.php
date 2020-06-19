<?php

use Illuminate\Database\Seeder;
use App\Instalacion;

class InstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Instalacion::class, 10)->create();    
    }
}
