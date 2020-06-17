<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Retencion;
use Faker\Generator as Faker;

$factory->define(Retencion::class, function (Faker $faker) {
    return [
        'BaseImponibleRenta' => $faker->randomDigit,
        'PorcentajeRenta' => $faker->randomDigit,  
        'ValorRenta' => $faker->randomDigit,
        'BaseImponibleIva' => $faker->randomDigit,  
        'PorcentajeIva' => $faker->randomDigit,
        'ValorIva' => $faker->randomDigit,  
        'NumeroComprobante' => $faker->text($maxNbChars = 50),
        'IdCobro' => $faker->randomDigitNot(0),
    ];
});
