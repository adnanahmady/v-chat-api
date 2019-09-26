<?php

namespace App\Helpers\Classes;

use App\Video;
use App\HelperClasses\FakeAbleMakerInterface;

class RandomVideo implements FakeAbleMakerInterface
{
    public function randomId(): int
    {
        return Video::all()->random()->id;
    }

    public function type(): string
    {
        return Video::class;
    }
}
