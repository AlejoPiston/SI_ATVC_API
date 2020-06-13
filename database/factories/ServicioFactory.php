<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name,
        'Descripcion' => Str::random(10),    
        'ValorInscripcion' => $faker->randomDigit,
        'ValorMensualidad' => $faker->randomDigit,
        'AplicaIva' => $faker->boolean,
        'AplicaIce' => $faker->boolean,
        'Estado' => $faker->boolean,
    ];
});
