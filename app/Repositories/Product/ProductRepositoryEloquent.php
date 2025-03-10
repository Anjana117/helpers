<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductRepositoryEloquent implements ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getByCategory(int $categoryId)
    {
        return $this->model->where('category_id', $categoryId)->get();
    }

    public function store(array $data)
    {

        try {
            return $this->model->create($data);

        } catch (\Exception $ex) {

            throw new Exception('Failed to store category: ' . $ex->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $product = $this->model->find($id);

            if (!$product) {
                throw new Exception("Product not found with id {$id}");
            }
            return $product->delete();
        } catch (Exception $e) {
            throw new Exception('Failed to delete Product: ' . $e->getMessage());
        }
    }
}
