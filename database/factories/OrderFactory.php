<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' =>  App\User::all()->random()->id,
        'date' => now(),
        'state' => $faker->numberBetween($min = 1, $max = 3),
        'priority' => $faker->numberBetween($min = 1, $max = 3),
        'total_products' => $faker->numberBetween($min = 1, $max = 10),
        'amount' => $faker->numberBetween($min = 350, $max = 4000),
    ];
});
