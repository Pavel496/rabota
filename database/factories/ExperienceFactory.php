<?php

$factory->define(App\Experience::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "slug" => $faker->name,
    ];
});
