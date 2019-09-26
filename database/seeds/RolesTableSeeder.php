<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create(['slug' => 'admin', 'title' => 'Admin']);
        \App\Role::create(['slug' => 'normal', 'title' => 'User']);
    }
}
