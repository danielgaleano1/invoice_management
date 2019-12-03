<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\invoice_state::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'state' => 1,
    ];
});
