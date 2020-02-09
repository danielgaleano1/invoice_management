<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween(14000000, 28000000),
        'description' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'stock' => $faker->numberBetween(400, 1800),
        'price' => $faker->numberBetween(100, 18000),
    ];
});
