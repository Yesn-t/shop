<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'departament_id' =>  App\Departament::all()->random()->id,
        'category_id' =>  App\Category::all()->random()->id,
        'name' => "aaa",
        'size' => " s | m | l",
        'description' => $faker->text,
        'amount' => $faker->numberBetween($min = 350, $max = 4000),
    ];
});
