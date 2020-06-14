<?php

use Illuminate\Database\Seeder;
use App\Ficha;

class FichaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ficha::class, 10)->create();    
    }
}
