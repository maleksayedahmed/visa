<?php

namespace App\Repository;

use App\Models\ModelType;

class ModelTypesRepository extends BaseRepository
{
    protected $model;

    public function __construct(ModelType $model)
    {
        $this->model = $model;
    }
}
