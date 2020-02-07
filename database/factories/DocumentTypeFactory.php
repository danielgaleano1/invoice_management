<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DocumentType;
use Faker\Generator as Faker;

$factory->define(DocumentType::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->text($maxNbChars = 5),
        'name' => 'Cédula de ciudadania',
    ];
});
