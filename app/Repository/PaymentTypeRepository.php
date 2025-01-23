<?php

namespace App\Repository;

use App\Models\PaymentType;

class PaymentTypeRepository extends BaseRepository
{
    protected $model;

    public function __construct(PaymentType $model)
    {
        $this->model = $model;
    }
}
