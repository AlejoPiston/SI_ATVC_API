<?php

use Illuminate\Database\Seeder;
use App\CompromisoPago;

class CompromisoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CompromisoPago::class, 10)->create();    
    }
}
