<?php

namespace App\Repositories;

use App\Http\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        return $this->model = $model;
    }

    public function all()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function delete()
    {

    }
}