<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InvoiceProduct;
use App\Product;
use App\Invoice;
use Faker\Generator as Faker;

$factory->define(InvoiceProduct::class, function (Faker $faker) {
    return [
        'product_id' => factory(Product::class),
        'invoice_id' => factory(Invoice::class),
        'quantity' => 1,
        'price' => 10000,
    ];
});
