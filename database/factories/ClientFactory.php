<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\City;

use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'city_id' => factory(City::class),
        'document_type_id' => 1,
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
