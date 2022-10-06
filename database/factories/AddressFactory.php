<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\Commune;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street'        => $faker->word,
        'nro'           => $faker->numberBetween(1, 1000),
        'commune_id'    => Commune::all()->random()->id
    ];
});
