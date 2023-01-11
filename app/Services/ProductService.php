<?php

namespace App\Services;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Utils\ImageUpload;


class ProductService
{
    private $productRepo;
    private $categoryRepo;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    
    public function getAll()
    {
        return $this->productRepo->getAll();
    }
    public function getById($id)
    {
        return $this->productRepo->getById($id);
    }
    public function store($param)
    {
        if(isset($param['image']) )
        {
            $param['image'] = ImageUpload::uploadImage($param['image']);
        }
        $product = $this->productRepo->store($param);

        if(isset($param['images']))
        {
           $this->productRepo->addImages($param['images'], $product['id']);
        }

    }
    public function update($id, $param)
    {
        return $this->productRepo->update($id, $param);
    }
    public function delete($id)
    {
        return $this->productRepo->delete($id);
    }
    public function baseQuery($relations=[])
    {
        return $this->productRepo->baseQuery();
    }

}
