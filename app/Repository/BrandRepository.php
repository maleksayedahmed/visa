<?php

namespace App\Repository;

use App\Models\Brand;

class BrandRepository extends BaseRepository
{
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }
}
