<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CobroMensualidad;
use Faker\Generator as Faker;

$factory->define(CobroMensualidad::class, function (Faker $faker) {
    return [
        'IdCobro' => $faker->randomDigitNot(0),
        'IdMensualidad' => $faker->randomDigitNot(0),
        'Valor' => $faker->randomDigit,
    ];
});
