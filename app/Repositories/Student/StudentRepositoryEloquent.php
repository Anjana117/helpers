<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\Student\StudentRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class  StudentRepositoryEloquent implements StudentRepository
{
    protected $model;

    public function __construct(Student $model)
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
