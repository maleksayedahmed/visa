<?php

namespace App\Repository;

use App\Models\PackageOffer;

class PackageOfferRepository extends BaseRepository
{
    protected $model;

    public function __construct(PackageOffer $model)
    {
        $this->model = $model;
    }
}
