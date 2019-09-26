<?php

use Illuminate\Database\Seeder;

class SharesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Share::class, 10)->create();
    }
}
