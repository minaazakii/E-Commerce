<?php

namespace App\Repository;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Utils\ImageUpload;

class ProductRepository implements RepositoryInterface
{
    private $product;
    private $productImages;
    public function __construct(Product $product,ProductImage $productImages)
    {
        $this->product = $product;
        $this->productImages = $productImages;
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
    public function addImages($images=[],$product_id)
    {
        foreach($images as $image)
        {
            $this->productImages->create(
                [
                    'product_id' => $product_id,
                    'image' => ImageUpload::uploadImage($image)
                ]);
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
