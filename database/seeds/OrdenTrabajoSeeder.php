<?php

use Illuminate\Database\Seeder;
use App\OrdenTrabajo;

class OrdenTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrdenTrabajo::class, 10)->create();

    }
}
