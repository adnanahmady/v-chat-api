<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Helpers\Classes\RandomElement;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $commentable = new RandomElement(new \App\Helpers\Classes\RandomVideo());

    return [
        'user_id' => User::all()->random()->id,
        'content' => $faker->text(),
        'commentable_id' => $commentable->id(),
        'commentable_type' => $commentable->type(),
    ];
});

$factory->state(Comment::class, 'reply', function (Faker $faker) {
    $commentable = new RandomElement(new \App\Helpers\Classes\RandomComment());

    return [
        'user_id' => User::all()->random()->id,
        'content' => $faker->text(),
        'commentable_id' => $commentable->id(),
        'commentable_type' => $commentable->type(),
    ];
});
