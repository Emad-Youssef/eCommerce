<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Http\Interfaces\RepositoryInterface;

class ProductRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Brand $model)
    {
        return $this->model = $model;
    }

    public function store(array $data)
    {
        //
    }

    public function update(array $data)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}