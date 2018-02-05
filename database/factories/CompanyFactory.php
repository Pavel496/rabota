<?php

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "describition" => $faker->name,
        "address" => $faker->name,
        "site" => $faker->name,
        "phone" => $faker->name,
        "contacts" => $faker->name,
        "rating" => $faker->name,
        "moder_checking" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
