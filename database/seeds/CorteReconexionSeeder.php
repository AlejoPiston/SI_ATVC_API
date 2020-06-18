<?php

use Illuminate\Database\Seeder;
use App\CorteReconexion;

class CorteReconexionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CorteReconexion::class, 10)->create();    
    }
}
