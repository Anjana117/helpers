<?php

namespace App\Repositories\Category;


interface CategoryRepository
{
    public function store($data);
    public function getAll();

}
