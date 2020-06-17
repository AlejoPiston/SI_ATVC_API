<?php

use Illuminate\Database\Seeder;
use App\Cobro;

class CobroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cobro::class, 10)->create();    

    }
}
