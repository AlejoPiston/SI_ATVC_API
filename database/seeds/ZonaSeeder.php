<?php

use Illuminate\Database\Seeder;
use App\Zona;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Zona::class, 10)->create();
    }
}
