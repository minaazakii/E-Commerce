<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryStoreRequest;
use App\Http\Requests\Dashboard\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.categories.index',
        [
            'mainCategories'=>$mainCategories,
        ]);
    }
    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->store($request->validated());
        return back();
    }
    public function edit($id)
    {
        $category = $this->categoryService->getCatById($id,true);
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.categories.edit',
        [
            'category'=>$category,
            'mainCategories'=>$mainCategories,
        ]);
    }
    public function delete(Request $request)
    {
        Category::find($request->id)->delete();
        return back()->with('success','Category delete');
    }
    public function getAll()
    {
        return $this->categoryService->datatable();
    }
    public function update(CategoryUpdateRequest $request,$id)
    {
        
        $this->categoryService->update($request->validated(),$id);
        return redirect()->route('dashboard.category.edit',$id);

    }

}
