<?php

namespace App\Repositories\User;


interface UserRepository
{
    /**
     * Get searched data
     */
    public function getSearchData($text);


    public function store(array $data);

    public function update(array $data, $id);
}
