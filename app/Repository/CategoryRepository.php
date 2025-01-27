<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository  extends BaseRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
