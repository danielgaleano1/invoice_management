<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Country;
use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'country_id' => factory(Country::class),
        'name' => $faker->city,
    ];
});
