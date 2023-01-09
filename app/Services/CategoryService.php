<?php

namespace App\Services;
use App\Models\Category;
use App\Utils\ImageUpload;
use Yajra\DataTables\DataTables;

class CategoryService
{
    public function getMainCategories()
    {
        return Category::where('parent_id', null)->orWhere('parent_id', 0)->get();
    }

    public function datatable()
    {
         // route('dashboard.categories.delete', $row->id)
         $query = Category::select('*')->with('parent');
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

        return Category::create($param);
    }

    public function getCatById($id,$childrenCount = false)
    {
       $query = Category::where('id',$id);

       if($childrenCount)
       {
        $query->withCount('child');
       }
       return $query->firstOrFail();
    }

    public function update($param,$id)
    {
        $category = $this->getCatById($id);
        if(isset($param['image']))
        {
            $param['image'] = ImageUpload::uploadImage($param['image']);
        }

        return $category->update($param);
    }

}
