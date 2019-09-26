<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $userId = \App\User::with('profile')
        ->get()
        ->filter(function ($user) {
            return $user->profile()->exists() === FALSE;
        })->pluck('id')->first();

    if (! $userId) return FALSE;

    return [
        'user_id' => $userId,
        'name' => $faker->sentence(2),
        'bio' => $faker->text(),
    ];
});
