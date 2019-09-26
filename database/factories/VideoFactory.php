<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) use ($file) {
    $storage = '\Illuminate\Support\Facades\Storage';

    $videos = collect($storage::files('public/videos'))->map(
        function ($video) use ($storage) {
            return $storage::url($video);
        }
    )->toArray();

    return [
        'user_id' => $faker->randomElement(\App\User::pluck('id')),
        'path' => $faker->randomElement($videos),
        'access' => $faker->randomElement(['public', 'protected', 'private'])
    ];
});
