<?php

namespace App\Repository;

use App\Models\DoctorSpecialization;

class DoctorSpecializationRepository extends BaseRepository
{
    protected $model;

    public function __construct(DoctorSpecialization $model)
    {
        $this->model = $model;
    }
}
