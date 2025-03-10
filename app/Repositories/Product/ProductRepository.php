<?php

namespace App\Repositories\Product;


interface ProductRepository
{
    public function store(array $data);
    public function getByCategory(int $categoryId);
    public function delete(int $id);
}
