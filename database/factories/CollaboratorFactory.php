<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collaborator;
use App\City;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Collaborator::class, function (Faker $faker) {
    return [
        'city_id' => factory(City::class),
        'profile_id' => factory(Profile::class),
        'code' => $faker->numberBetween(14000000, 28000000),
        'name' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'password' => $faker->password,
    ];
});
