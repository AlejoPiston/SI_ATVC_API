<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompromisoPago;
use Faker\Generator as Faker;

$factory->define(CompromisoPago::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->date,
        'Observacion' => $faker->text($maxNbChars = 50),
        'IdFicha' => $faker->randomDigitNot(0),
        'IdUsuario' => $faker->randomDigitNot(0),
    ];
});
