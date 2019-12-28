<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\collaborator;
use Faker\Generator as Faker;

$factory->define(App\collaborator::class, function (Faker $faker) {
    return [
        'city_id' => factory(App\City::class),
        'profile_id' => factory(App\profile::class),
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'password' => $faker->password,
    ];
});
