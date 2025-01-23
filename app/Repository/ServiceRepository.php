<?php

namespace App\Repository;

use App\Models\Service;

class ServiceRepository extends BaseRepository
{
    protected $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
