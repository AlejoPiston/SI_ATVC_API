<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ficha;
use Faker\Generator as Faker;

$factory->define(Ficha::class, function (Faker $faker) {
    return [
        'Nombres' => $faker->name,
        'Apellidos' => $faker->name,    
        'CedulaRuc' => $faker->creditCardNumber,
        'DireccionDomicilio' => $faker->city,
        'TelefonoDomicilio' => $faker->phoneNumber,
        'DireccionCobro' => $faker->city,
        'TelefonoCobro' => $faker->phoneNumber,
        'Referencia' => $faker->address,
        'CobroDomicilio' => $faker->boolean,    
        'Archivada' => $faker->boolean,
        'FechaInscripcion' => $faker->date,
        'Email' => $faker->email,
        'ValorInscripcion' => $faker->randomDigit,
        'ValorMaterial' => $faker->randomDigit,
        'ValorOtros' => $faker->randomDigit,
        'ValorMensual' => $faker->randomDigit,    
        'FechaCobro' => $faker->date,
        'Observacion' => $faker->text($maxNbChars = 50),
        'Estado' => $faker->boolean,
        'TvAdicional' => $faker->randomDigit,
        'Filtro' => $faker->boolean,
        'MensualidadesPendientes' => $faker->randomDigit,
        'Factura' => $faker->boolean,    
        'Renegociar' => $faker->boolean,
        'PagadoHasta' => $faker->date,
        'NumSerieEquipo' => Str::random(10),
        'EquipoRetirado' => $faker->boolean,
        'IdZona' => $faker->randomDigitNot(0),
        'IdServicio' => $faker->randomDigitNot(0),
    ];
});
