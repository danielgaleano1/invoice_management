<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'city_id' => factory(App\City::class),
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
    ];
});
