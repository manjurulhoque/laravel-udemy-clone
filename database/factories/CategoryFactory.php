<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $text = $faker->sentence(2);
    return [
        'title' => $text,
        'slug' => str_slug($text)
    ];
});
