<?php

use Illuminate\Database\Seeder;
use App\CierreCaja;

class CierreCajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CierreCaja::class, 10)->create();    

    }
}
