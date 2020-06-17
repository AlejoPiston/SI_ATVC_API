<?php

use Illuminate\Database\Seeder;
use App\OtroIngreso;

class OtroIngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OtroIngreso::class, 10)->create();    

    }
}
