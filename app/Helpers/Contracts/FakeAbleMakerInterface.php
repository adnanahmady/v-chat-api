<?php

namespace App\HelperClasses;

interface FakeAbleMakerInterface
{
    /**
     * get Objects Id
     *
     * @return Integer
     */
    public function randomId(): int;

    /**
     * get Objects Type
     *
     * @return string
     */
    public function type(): string;
}
