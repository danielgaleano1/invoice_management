<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\collaborator;
use Faker\Generator as Faker;

$factory->define(App\collaborator::class, function (Faker $faker) {
    return [
        'city_id' => function () {
            return factory(App\city::class)->create()->id;
        },
        'profile_id' => function () {
            return factory(App\profile::class)->create()->id;
        },
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'password' => $faker->password,
    ];
});
