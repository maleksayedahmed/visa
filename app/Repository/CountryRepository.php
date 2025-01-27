<?php

namespace App\Repository;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
