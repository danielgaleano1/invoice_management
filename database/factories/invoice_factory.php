<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Collaborator;
use Faker\Generator as Faker;

$factory->define(App\invoice::class, function (Faker $faker) {
    return [
        'collaborator_id' => factory(Collaborator::class),
        'client_id' => factory(App\Client::class),
        'invoice_state_id' => factory(App\invoice_state::class),
        'code' => $faker->numberBetween(100000, 700000),
        'expiration_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = null),
        'date_of_receipt' => null,
        'value_tax' => 9500,
        'total_value' => 50000,
    ];
});
