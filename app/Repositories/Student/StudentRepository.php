<?php

namespace App\Repositories\Student;



interface StudentRepository
{

    public function store(array $data);
    public function getAll();


}
