<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'departament_id' =>  App\Departament::all()->random()->id,
        'category_id' =>  App\Category::all()->random()->id,
        'name' => $faker->randomElement(['Air Big', 'Air Max', 'SportsWear', 'Gore-Tex', 'Rise 365', 'Phenom Wild', 'Sport DNA']),
        'size' => $faker->randomElement(['S', 'L', 'M']),
        'description' => $faker->text,
        'amount' => $faker->numberBetween($min = 350, $max = 4000),
    ];
});
