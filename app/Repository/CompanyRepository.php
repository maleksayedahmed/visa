<?php

namespace App\Repository;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }
}
