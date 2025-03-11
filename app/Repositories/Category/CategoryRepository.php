<?php

namespace App\Repositories\Category;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{
    public function store(array $data);
    public function getAll();
    public function getCategoryId(int $id);


}
