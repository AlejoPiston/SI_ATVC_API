<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instalacion;
use Faker\Generator as Faker;

$factory->define(Instalacion::class, function (Faker $faker) {
    return [
        'NombreCliente' => $faker->name,
        'Direccion' => $faker->city,
        'Referencia' => $faker->address,
        'Telefono' => $faker->phoneNumber,
        'Fecha' => $faker->date,
        'Activa' => $faker->boolean,
        'FechaHoraArrivo' => $faker->date,    
        'FechaHoraSalida' => $faker->date, 
        'Resultado' => $faker->text($maxNbChars = 50),
        'IdVendedor' => $faker->randomDigitNot(0),
        'IdTurno' => $faker->randomDigitNot(0),
        'IdEmpleado' => $faker->randomDigitNot(0),
    ];
});
