<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\profile::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'state' => 1,
    ];
});
