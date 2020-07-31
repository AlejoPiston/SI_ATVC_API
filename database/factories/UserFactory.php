<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        'Apellidos' => $faker->name,
        'Cedula' => $faker->creditCardNumber, 
        'Direccion' => $faker->address, 
        'Telefono' => $faker->PhoneNumber, 
        'Tipo' => $faker->randomElement(['tecnico','cliente','administrador']), 
        'Usuario' => $faker->name,
        'Estado' => $faker->boolean,
    ];
});
