<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create()->each(function($user) {
            $user->profile()->save(factory(\App\Profile::class)->create());
            $profile = \App\Profile::find($user->profile()->first()->id);
            $profile->avatar()->save(factory(\App\Avatar::class)->create());
            $user->roles()->attach(\App\Role::all()->random()->id);
        });
    }
}
