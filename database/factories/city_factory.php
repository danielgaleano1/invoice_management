<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\country;
use Faker\Generator as Faker;

$factory->define(App\city::class, function (Faker $faker) {
    return [
        'country_id' => factory(country::class),
        'name' => $faker->city,
    ];
});
