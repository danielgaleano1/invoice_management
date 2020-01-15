<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Collaborator;
use App\Client;
use App\InvoiceState;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'collaborator_id' => factory(Collaborator::class),
        'client_id' => factory(Client::class),
        'invoice_state_id' => factory(InvoiceState::class),
        'code' => $faker->numberBetween(100000, 700000),
        'expiration_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = null),
        'date_of_receipt' => null,
        'value_tax' => 9500,
        'total_value' => 50000,
    ];
});
