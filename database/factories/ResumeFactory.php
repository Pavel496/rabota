<?php

$factory->define(App\Resume::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "text" => $faker->name,
        "wage" => $faker->name,
        "company_address" => $faker->name,
        "experience_id" => factory('App\Experience')->create(),
        "lasting_id" => factory('App\Lasting')->create(),
        "phone_id" => factory('App\Phone')->create(),
        "phone_temp" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "to_delete_at" => $faker->date("d/m/Y", $max = 'now'),
    ];
});
