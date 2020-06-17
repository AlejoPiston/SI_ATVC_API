<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'Nombres' => $faker->name,
        'Apellidos' => $faker->name,    
        'Cedula' => $faker->creditCardNumber,
        'Direccion' => $faker->city,
        'Telefono' => $faker->phoneNumber,
        'Tipo' => $faker->city,
        'Password' => $faker->phoneNumber,
        'Usuario' => $faker->name,
        'Estado' => $faker->boolean,
    ];
});
