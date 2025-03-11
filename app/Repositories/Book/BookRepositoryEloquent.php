<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\Book\BookRepository;
use Exception;


class BookRepositoryEloquent implements BookRepository
{
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $ex) {
            throw new Exception('Failed to store category: ' . $ex->getMessage());
        }
    }

    public function getAll()
    {
        try {
            return $this->model->all();

        } catch (Exception $e) {

            throw new Exception('Failed to retrieve categories: ' . $e->getMessage());
        }
    }
}
