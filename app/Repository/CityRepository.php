<?php

namespace App\Repository;

use App\Models\City;

class CityRepository extends BaseRepository
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
