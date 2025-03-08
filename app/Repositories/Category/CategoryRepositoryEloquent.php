<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;


class CategoryRepositoryEloquent implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    
    public function store($data)
    {
            return $this->model->create($data);
    }
    public function getAll(){
        return $this->model->all();
    }

}
