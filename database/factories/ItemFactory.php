<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(10,1000),
        'stock' => $faker ->numberBetween(10,100)
    ];
});
