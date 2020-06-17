<?php

use Illuminate\Database\Seeder;
use App\Retencion;

class RetencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Retencion::class, 10)->create();    

    }
}
