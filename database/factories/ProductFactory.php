<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween($min = 100, $max = 6000),
        'stock' => $faker->randomDigit,
        'provider_id' => Provider::all()->random()->id
    ];
});

$factory->afterCreating(Product::class, function ($row, $faker) {
    $row->subsidiaries()->attach(rand(1,5));
});
