<?php

namespace App\Helpers\Classes;

use App\Comment;
use App\HelperClasses\FakeAbleMakerInterface;

class RandomComment implements FakeAbleMakerInterface
{
    public function randomId(): int
    {
        return Comment::all()->random()->id;
    }

    public function type(): string
    {
        return Comment::class;
    }
}
