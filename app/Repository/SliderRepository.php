<?php

namespace App\Repository;

use App\Models\Slider;

class SliderRepository extends BaseRepository
{
    protected $model;

    public function __construct(Slider $model)
    {
        $this->model = $model;
    }
}
