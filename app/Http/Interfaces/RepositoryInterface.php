<?php

namespace App\Http\Interfaces;

interface RepositoryInterface
{
    public function store(array $data);

    public function update(array $data);

    public function show($id);

    public function delete($id);
}
