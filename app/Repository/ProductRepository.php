<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements RepositoryInterface
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }
	public function getById($id)
    {
        return $this->product->find($id);
    }
	public function store($param)
    {
        $product = $this->product->create($param);
        return $product;
    }
	public function update($id, $param)
    {
        $product = $this->getById($id);
        return $product->update($param);
	}
	public function delete($id)
    {
        $product = $this->getById($id);
        return $product->delete();
	}
    public function baseQuery($relations=[])
    {
        $query = $this->product->select('*')->with($relations);
        return $query;
    }
}
