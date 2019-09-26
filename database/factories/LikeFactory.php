<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Helpers\Classes\RandomElement;
use App\Helpers\Classes\RandomVideo;
use App\Helpers\Classes\RandomComment;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    $random = $faker->randomElement([RandomVideo::class, RandomComment::class]);
    $likable = new RandomElement(new $random);

    return [
        'user_id' => \App\User::all()->random()->id,
        'likable_id' => $likable->id(),
        'likable_type' => $likable->type(),
    ];
});
