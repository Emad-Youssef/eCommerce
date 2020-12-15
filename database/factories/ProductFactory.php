<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => 'عربي-'.$faker->text(60),
        'description' => 'عربي-'.$faker->paragraph(),
        'slug' => $faker->slug(),
        'price' => $faker->numberBetween(10, 9000),
        'selling_price' => $faker->numberBetween(10, 9000),
        'sku' => $faker->word(),
        'manage_stock'  => false,
        'in_stock' => $faker->boolean(),
        'is_active' => $faker->boolean()
    ];

    
});
