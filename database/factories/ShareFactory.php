<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Share;
use Faker\Generator as Faker;

$factory->define(Share::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'consumer_id' => \App\User::all()->random()->id,
        'shareable_id' => \App\Video::all()->random()->id,
        'shareable_type' => $faker->randomElement([\App\Video::class])
    ];
});
