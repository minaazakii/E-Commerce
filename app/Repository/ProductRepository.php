<?php

namespace App\Repository;

use App\Models\Product;
use App\Models\ProductColor;

class ProductRepository implements RepositoryInterface
{
    private $product;
    private $productColor;
    public function __construct(Product $product,ProductColor $productColor)
    {
        $this->product = $product;
        $this->productColor = $productColor;
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
    public function addColor($product, $colors=[])
    {
        foreach ($colors as $color)
        {
            $this->productColor->create(['product_id'=>$product->id, 'color'=>$color]);
        }

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
