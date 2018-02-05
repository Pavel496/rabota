<?php

$factory->define(App\Phone::class, function (Faker\Generator $faker) {
    return [
        "phone" => $faker->name,
        "code" => $faker->name,
        "status" => 0,
        "created_by_id" => factory('App\User')->create(),
    ];
});
