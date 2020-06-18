<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CorteReconexion;
use Faker\Generator as Faker;

$factory->define(CorteReconexion::class, function (Faker $faker) {
    return [
        'Fechacorte' => $faker->date,
        'ObservacionCorte' => $faker->text($maxNbChars = 50),
        'FechaReconexion' => $faker->date,
        'ObservacionReconexion' => $faker->text($maxNbChars = 50),   
        'IdFicha' => $faker->randomDigitNot(0),
        'IdUsuarioCorte' => $faker->randomDigitNot(0),
        'IdUsuarioReconexion' => $faker->randomDigitNot(0),
    ];
});
