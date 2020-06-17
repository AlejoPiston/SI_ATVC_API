<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CierreCaja;
use Faker\Generator as Faker;

$factory->define(CierreCaja::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->date,
        'ValorCuadrar' => $faker->randomDigit,
        'Faltante' => $faker->randomDigit,  
        'Observacion' => $faker->text($maxNbChars = 50),
        'UnCentavo' => $faker->randomDigit,
        'CincoCentavos' => $faker->randomDigit,
        'DiezCentavos' => $faker->randomDigit,
        'VeinticincoCentavos' => $faker->randomDigit,
        'CincuentaCentavos' => $faker->randomDigit,
        'DolarMoneda' => $faker->randomDigit,
        'DolarBillete' => $faker->randomDigit,
        'CincoDolares' => $faker->randomDigit,
        'DiezDolares' => $faker->randomDigit,
        'VeinteDolares' => $faker->randomDigit,
        'CincuentaDolares' => $faker->randomDigit,
        'CienDolares' => $faker->randomDigit,
        'Cheques' => $faker->randomDigit,
        'Ingresos' => $faker->randomDigit,
        'Gastos' => $faker->randomDigit,
        'MontoApertura' => $faker->randomDigit,
        'MontoDeposito' => $faker->randomDigit,
        'MontoCierre' => $faker->randomDigit,
        'OtrosIngresos' => $faker->randomDigit,
        'Retenciones' => $faker->randomDigit,
        'Abierta' => $faker->boolean,
        'IdUsuario' => $faker->randomDigitNot(0),
    ];
});
