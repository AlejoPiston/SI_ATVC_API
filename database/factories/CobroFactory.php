<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cobro;
use Faker\Generator as Faker;

$factory->define(Cobro::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->date,
        'ValorEfectivo' => $faker->randomDigit,
        'ValorCheque' => $faker->randomDigit,  
        'NumeroCheque' => $faker->text($maxNbChars = 50),
        'BancoCheque' => $faker->text($maxNbChars = 50),
        'ValorTotal' => $faker->randomDigit,
        'Iva' => $faker->randomDigit,
        'Concepto' => $faker->text($maxNbChars = 50),
        'NumeroDocumento' => $faker->text($maxNbChars = 50),
        'TipoDocumento' => $faker->text($maxNbChars = 50),
        'Descuento' => $faker->randomDigit,
        'Ice' => $faker->randomDigit,
        'Observacion' => $faker->text($maxNbChars = 50),
        'Reverso' => $faker->boolean,
        'ComentarioReverso' => $faker->text($maxNbChars = 50),
        'Retencion' => $faker->randomDigit,
        'FechaReverso' => $faker->date,
        'EnviadoAzur' => $faker->text($maxNbChars = 50),
        'Electronico' => $faker->text($maxNbChars = 50),
        'PorCobrar' => $faker->boolean,
        'IdUsuario' => $faker->randomDigitNot(0),
        'IdUsuarioReverso' => $faker->randomDigitNot(0),
        'Establecimiento' => $faker->randomDigitNot(0),
        'PuntoEmision' => $faker->randomDigitNot(0),
    ];
});
