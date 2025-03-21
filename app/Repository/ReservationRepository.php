<?php

namespace App\Repository;

use App\Models\Reservation;

class ReservationRepository extends BaseRepository
{
    protected $model;

    public function __construct(Reservation $model)
    {
        $this->model = $model;
    }
}
