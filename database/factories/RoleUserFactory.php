<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $userId = \App\User::with('roles')->get()->filter(function ($user) {
        return $user->roles()->exists() === false;
    })->pluck('id')->first();
    return [
        'role_id' => \App\Role::all()->random()->id,
        'user_id' => $userId
    ];
});
