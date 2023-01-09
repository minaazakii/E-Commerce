<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function store($param);
    public function update($id, $param);
    public function delete($id);
    public function baseQuery($relations = []);
}

