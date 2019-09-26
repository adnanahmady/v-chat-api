<?php

namespace App\Helpers\Classes;

use App\HelperClasses\FakeAbleMakerInterface;

/**
 * A dependency injection implementation for
 * model type and random id
 *
 * @package App\Helpers\Classes
 */
class RandomElement
{
    private $model;

    /**
     * RandomElement constructor.
     *
     * @param \App\HelperClasses\FakeAbleMakerInterface $model
     */
    public function __construct(FakeAbleMakerInterface $model)
    {
        $this->model = $model;
    }

    /**
     * get random id of model
     *
     * @return int
     */
    public function id()
    {
        return $this->model->randomId();
    }

    /**
     * get models namespace
     *
     * @return string
     */
    public function type()
    {
        return $this->model->type();
    }
}
