<?php

namespace App\Repository;

use App\Models\Pet;

class PetRepository extends BaseRepository
{
    protected $model;

    public function __construct(Pet $model)
    {
        $this->model = $model;
    }
}
