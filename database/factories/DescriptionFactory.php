<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Description;
use Faker\Generator as Faker;

$factory->define(Description::class, function (Faker $faker) {
    $videoId = \App\Video::with('description')->get()->filter(function ($video) {
        return $video->description()->exists() === FALSE;
    })->pluck('id')->first()
    ;

    return [
        'video_id' => $videoId,
        'title' => $faker->sentence(2, 6),
        'description' => $faker->text()
    ];
});
