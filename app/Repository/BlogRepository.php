<?php

namespace App\Repository;

use App\Models\Blog;

class BlogRepository extends BaseRepository
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }
}
