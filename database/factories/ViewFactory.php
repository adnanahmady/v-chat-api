<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\View;
use Faker\Generator as Faker;

$factory->define(View::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'viewable_id' => \App\Video::all()->random()->id,
        'viewable_type' => $faker->randomElement([\App\Video::class])
    ];
});
