<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Calendar;
use Faker\Generator as Faker;

$factory->define(App\Calendar::class, function (Faker $faker) {
    return [
        'room_id' => $faker->numberBetween(1, 10),
        'time_from' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 hour', null),
        'time_to' => $faker->dateTimeBetween($startDate = '+2 hour', $endDate = '+3 hour', null),
        'client_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 1),
        'payment_id' => $faker->numberBetween(1, 150),
        'cancelled' => $faker->boolean(80),
    ];
});
