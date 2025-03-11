<?php

namespace App\Repositories\BookCategory;

interface BookCategoryRepository
{
    public function store(array $data);
    public function getAll();

}
