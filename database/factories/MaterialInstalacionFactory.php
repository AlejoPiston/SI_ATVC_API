<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MaterialInstalacion;
use Faker\Generator as Faker;

$factory->define(MaterialInstalacion::class, function (Faker $faker) {
    return [
        'IdFicha' => $faker->randomDigitNot(0),
        'IdValorAdicional' => $faker->randomDigitNot(0),
        'Cantidad' => $faker->randomDigit,
        'CostoUnitario' => $faker->randomDigit,
        'Comentario' => $faker->text($maxNbChars = 50),

    ];
});
