<?php

namespace App\Repository;

use App\Models\Offer;

class OfferRepository extends BaseRepository
{
    protected $model;

    public function __construct(Offer $model)
    {
        $this->model = $model;
    }
}
