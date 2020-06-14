<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensualidad;
use Faker\Generator as Faker;

$factory->define(Mensualidad::class, function (Faker $faker) {
    return [
        'FechaInicio' => $faker->date,
        'FechaFin' => $faker->date,    
        'Valor' => $faker->randomDigit,
        'Abono' => $faker->randomDigit,
        'Saldo' => $faker->randomDigit,
        'Tipo' => Str::random(10),
        'AplicaIce' => $faker->boolean,
        'IdFicha' => $faker->randomDigitNot(0),
    ];
});
