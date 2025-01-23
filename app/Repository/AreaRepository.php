<?php

namespace App\Repository;

use App\Models\Area;

class AreaRepository extends BaseRepository
{
    protected $model;

    public function __construct(Area $model)
    {
        $this->model = $model;
    }
}

