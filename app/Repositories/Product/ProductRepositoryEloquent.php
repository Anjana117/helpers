<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;


class ProductRepositoryEloquent implements ProductRepository
{
    protected $model;

    public function __construct(Product $model)
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
