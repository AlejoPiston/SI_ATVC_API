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
        Zona::create([
            'Nombre' => 'Zona F',
            'Descripcion' => 'Desde Pastocalle hasta Sigchos',
            ]);
        Zona::create([
            'Nombre' => 'Zona E',
            'Descripcion' => 'Desde Guaytacama hasta Pastocalle',
            ]);
        Zona::create([
            'Nombre' => 'Zona D',
            'Descripcion' => 'Desde San buena aventura hasta José guango bajo',
            ]);
        Zona::create([
            'Nombre' => 'Zona C',
            'Descripcion' => 'Desde Pujilí hasta San Felipe de Latacunga',
            ]);
        Zona::create([
            'Nombre' => 'Zona B',
            'Descripcion' => 'Desde Saquisilí hasta el norte de Latacunga',
            ]);
        Zona::create([
            'Nombre' => 'Zona A',
            'Descripcion' => 'Desde Salcedo hasta el sur de Latacunga',
            ]);
    }
}
