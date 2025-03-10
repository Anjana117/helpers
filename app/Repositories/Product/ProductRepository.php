<?php

namespace App\Repositories\Product;


interface ProductRepository
{
    public function store($data);
    public function getAll();

}
