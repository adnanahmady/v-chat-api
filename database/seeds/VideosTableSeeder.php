<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Video::class, 19)->create()->each(function ($video) {
            $video->description()->save(factory(\App\Description::class)->create());
        });
    }
}
