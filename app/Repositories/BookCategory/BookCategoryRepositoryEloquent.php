<?php

namespace App\Repositories\BookCategory;

use App\Models\BookCategory;
use App\Repositories\BookCategory\BookCategoryRepository;
use Exception;


class BookCategoryRepositoryEloquent implements BookCategoryRepository
{
    protected $model;

    public function __construct(BookCategory $model)
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
