<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gasto;
use Faker\Generator as Faker;

$factory->define(Gasto::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->date,
        'Concepto' => Str::random(10),
        'Monto' => $faker->randomDigit,
        'IdUsuario' => $faker->randomDigitNot(0),
    ];
});
