<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\product::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween(14000000, 28000000),
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'stock' => $faker->numberBetween(400, 1800),
        'price' => $faker->numberBetween(140000, 980000),
    ];
});
