<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Avatar;
use Faker\Generator as Faker;

$factory->define(Avatar::class, function (Faker $faker) {
    $storage = '\Illuminate\Support\Facades\Storage';
    $static  = collect($storage::files('public/photos'))
        ->map(function ($avatar) use ($storage) {
                return $avatar = $storage::url($avatar);
        })->random()
    ;

    $profile = \App\Profile::with('avatar')->get()
        ->filter(function ($profile) {
            return $profile->avatar()->exists() === FALSE;
        })->pluck('id')->first()
    ;

    return [
        'profile_id' => $profile,
        'path' => $static,
        'title' => $faker->sentence(2)
    ];
});
