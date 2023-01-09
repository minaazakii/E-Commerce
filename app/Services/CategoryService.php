<?php

namespace App\Services;
use App\Models\Category;
use App\Repository\CategoryRepository;
use App\Utils\ImageUpload;
use Yajra\DataTables\DataTables;

class CategoryService
{
    public $categoryRepo;
    public function __construct(CategoryRepository $repo)
    {
        $this->categoryRepo = $repo;
    }
    public function getMainCategories()
    {
        return Category::where('parent_id', null)->orWhere('parent_id', 0)->get();
    }

    public function datatable()
    {
         // route('dashboard.categories.delete', $row->id)
         $query = $this->categoryRepo->baseQuery(['parent']);
         return DataTables::of($query)
             ->addIndexColumn()
             ->addColumn('action', function ($row) {
                 return $btn = '
                  <a href="' . route('dashboard.category.edit', $row->id) . '" class="btn btn-warning">Edit</a>

                 ';
             })
             ->addColumn('action2', function ($row) {
                 return $btn = ' <button  data-bs-toggle="modal" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger" data-bs-target="#deleteModal">Delete</button>';
             })
             ->addColumn('parent', function ($row) {
                if($row->parent)
                {
                    return $row->parent->name;
                }
                return 'قسم رئيسي ';
             })
             ->rawColumns(['parent','action','action2'])
             ->make(true);
    }
    public function store($param)
    {
        if(isset($param['image']))
        {
            $param['image'] = ImageUpload::uploadImage($param['image']);
        }

        return $this->categoryRepo->store($param);
    }

    public function getCatById($id,$childrenCount=false)
    {
       return $this->categoryRepo->getCatById($id,$childrenCount);
    }

    public function update($param,$id)
    {
        $category = $this->categoryRepo->getCatById($id);
        if(isset($param['image']))
        {
            $param['image'] = ImageUpload::uploadImage($param['image']);
        }

        return $this->categoryRepo->update($category,$param);
    }

}
