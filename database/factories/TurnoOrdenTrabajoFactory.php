<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TurnoOrdenTrabajo;
use Faker\Generator as Faker;

$factory->define(TurnoOrdenTrabajo::class, function (Faker $faker) {
    return [   
        'Hora' => $faker->randomDigitNot(0),
        'Minuto' => $faker->randomDigitNot(0),
    ];
});
