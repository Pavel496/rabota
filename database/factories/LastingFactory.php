<?php

$factory->define(App\Lasting::class, function (Faker\Generator $faker) {
    return [
        "lasting" => $faker->name,
        "slug" => $faker->name,
    ];
});
