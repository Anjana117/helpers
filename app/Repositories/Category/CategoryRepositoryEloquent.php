<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoryRepositoryEloquent implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function getCategoryId(int $id)
    {
        $id=$this->model->find($id);
        return $id;
    }

    public function store($data)
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

    // public function delete( int $id)
    // {

    //     try {
    //         $category = $this->model->find($id);

    //         if (!$category) {
    //             throw new Exception("Category not found with id {$id}");
    //         }
    //         return $category->delete();

    //       }
    //       catch (Exception $e)
    //        {

    //         throw new Exception('Failed to delete category: ' . $e->getMessage());
    //     }
    // }
}
