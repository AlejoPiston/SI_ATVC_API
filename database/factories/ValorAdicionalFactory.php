<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ValorAdicional;
use Faker\Generator as Faker;

$factory->define(ValorAdicional::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name,
        'Costo' => $faker->randomDigit,
        'Descripcion' => Str::random(10),
    ];
});
