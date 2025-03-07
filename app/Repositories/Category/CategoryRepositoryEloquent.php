<?php

namespace App\Repositories\User;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;


class CategoryRepositoryEloquent implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function store(array $data)
    {
            return $this->model->create($data);
    }


}
