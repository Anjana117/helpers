<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepository;



class UserRepositoryEloquent implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get searched data
     */
    public function getSearchData($text)
    {
        return $this->model->where('name', 'LIKE', "$text%")->get();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update (array $data, $id)
    {

        return $this->model->where('id',$id)->update($data);
    }



}
