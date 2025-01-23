<?php

namespace App\Repository;

use App\Models\PetsCategory;

class PetsCategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(PetsCategory $model)
    {
        $this->model = $model;
    }
}

