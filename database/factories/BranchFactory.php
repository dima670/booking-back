<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use Faker\Generator as Faker;

$factory->define(App\Branch::class, function (Faker $faker) {
    return [
        'branch_name' => $faker->company,
        'address' => $faker->address,
        'work_from' => $faker->time,
        'work_to' => $faker->time,
    ];
});
