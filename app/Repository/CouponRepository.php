<?php

namespace App\Repository;

use App\Models\Coupon;

class CouponRepository extends BaseRepository
{
    protected $model;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }
}
