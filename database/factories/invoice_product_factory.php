<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\invoice_product::class, function (Faker $faker) {
    return [
        'product_id' => factory(App\product::class),
        'invoice_id' => factory(App\invoice::class),
        'quantity' => 1,
        'price' => 10000,
    ];
});
