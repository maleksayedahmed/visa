<?php

namespace App\Repository;

use App\Models\Visa;

class VisaRepository  extends BaseRepository
{
    protected $model;

    public function __construct(Visa $model)
    {
        $this->model = $model;
    }
}
