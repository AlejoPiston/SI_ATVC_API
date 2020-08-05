<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrdenTrabajo;
use Faker\Generator as Faker;

$factory->define(OrdenTrabajo::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->date,
        'Dano' => $faker->text($maxNbChars = 50),
        'Resultado' => $faker->text($maxNbChars = 50),
        'Activa' => $faker->randomElement(['registrada','confirmada','en progreso','atendida','cancelada']), 
        'FechaHoraArrivo' => $faker->date,    
        'FechaHoraSalida' => $faker->date,    
        'IdFicha' => $faker->randomDigitNot(0),
        'IdTurno' => $faker->randomDigitNot(0),
        'IdEmpleado' => $faker->randomDigitNot(0),
    ];
});
