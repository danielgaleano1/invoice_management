<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\City;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'city_id' => factory(City::class),
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
    ];
});
