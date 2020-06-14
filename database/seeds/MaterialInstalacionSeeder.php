<?php

use Illuminate\Database\Seeder;
use App\MaterialInstalacion;

class MaterialInstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MaterialInstalacion::class, 2)->create();
    }
}
