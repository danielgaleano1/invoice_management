<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\invoice::class, function (Faker $faker) {
    return [
        'collaborator_id' => function () {
            return factory(App\collaborator::class)->create()->id;
        },
        'client_id' => function () {
            return factory(App\client::class)->create()->id;
        },
        'invoice_state_id' => function () {
            return factory(App\invoice_state::class)->create()->id;
        },
        'code' => $faker->numberBetween(100000, 700000),
        'expiration_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = null),
        'value_tax' => $faker->numberBetween(100, 1000),
        'total_value' => $faker->numberBetween(140000, 980000),
    ];
});
