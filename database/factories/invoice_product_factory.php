<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\invoice_product::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return factory(App\product::class)->create()->id;
        },
        'invoice_id' => function () {
            return factory(App\invoice::class)->create()->id;
        },
        'quantity' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(140000, 980000),
    ];
});
