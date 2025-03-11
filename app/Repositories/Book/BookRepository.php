<?php

namespace App\Repositories\Book;

interface BookRepository
{
    public function store(array $data);
    public function getAll();

}
