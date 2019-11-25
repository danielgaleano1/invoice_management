<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {

    static $number = 1;

    return [
        'id' => $number++,
        'name' => $faker->country,
    ];
});
