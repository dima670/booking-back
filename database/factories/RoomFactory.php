<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'room_name' => $faker->numberBetween(1, 100),
        'branch_id' => $faker->numberBetween(1, 5)
    ];
});
