<?php

namespace App\Repository;

use App\Models\VisaType;

class VisaTypeRepository  extends BaseRepository
{
    protected $model;

    public function __construct(VisaType $model)
    {
        $this->model = $model;
    }
}
