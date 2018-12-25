<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'short_description' => $faker->realText(100),
        'description' => $faker->realText(),
        'outcomes' => $faker->text(5),
        'section' => $faker->text(10),
        'requirements' => "Python, Linux, Basic Programming",
        'language' => 'English',
        'price' => rand(100, 150),
        'level' => 'Beginner',
        'thumbnail' => null,
        'video_url' => null,
        'visibility' => true,
        'category_id' => rand(1, 10)
    ];
});
