<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\City;
use App\DocumentType;

use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'city_id' => factory(City::class),
        'document_type_id' => factory(DocumentType::class),
        'code' => $faker->word,
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'address' => $faker->address,
        'phone' => $faker->numberBetween($min = 1000000000, $max = 9000000000),
        'email' => $faker->unique()->safeEmail,
    ];
});
