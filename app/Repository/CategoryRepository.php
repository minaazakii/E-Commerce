<?php

namespace App\Repository;
use App\Models\Category;

class CategoryRepository
{
    public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getMainCategories()
    {
        return $this->category->getMainCategories();
    }
    public function store($params)
    {
        return $this->category->create($params);
    }

    public function getCatById($id,$childrenCount=false)
    {
        $query = $this->category->where('id',$id);

        if($childrenCount)
        {
         $query->withCount('child');
        }
        return $query->firstOrFail();
    }

    public function update($category,$params)
    {
        return $category->update($params);
    }
}
