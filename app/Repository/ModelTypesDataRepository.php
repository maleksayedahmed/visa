<?php

namespace App\Repository;

use App\Models\ModelTypeData;

class ModelTypesDataRepository extends BaseRepository
{
    protected $model;

    public function __construct(ModelTypeData $model)
    {
        $this->model = $model;
    }
}
