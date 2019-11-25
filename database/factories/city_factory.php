<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\city::class, function (Faker $faker) {
    return [
        'country_id' => function () {
            return factory(App\country::class)->create()->id;
        },
        'name' => $faker->city,
    ];
});
