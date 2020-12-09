<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => 'عربي-'.$faker->word(),
        'slug' => $faker->slug(),
        'is_active' => $faker->boolean()
    ];
});
