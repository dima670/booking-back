<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'client_id' => $faker->numberBetween(1, 50),
        'calendar_id' => $faker->numberBetween(1, 100),
        'price' => $faker->randomFloat(2, 100, 2000),
        'paid' => $faker->randomFloat(2, 0, 20000),
        'comment' => $faker->sentence(7, true),
    ];
});
