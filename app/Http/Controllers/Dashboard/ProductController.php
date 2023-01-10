<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductStoreRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService,$categoryService;
    public function __construct(ProductService $productService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $products = $this->productService->getAll();
        return view('dashboard.products.index',
        [
            'products' => $products
        ]);
    }
    public function create()
    {
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.products.create',
        [
            'mainCategories' => $mainCategories,
        ]);
    }
    public function store(ProductStoreRequest $request)
    {

        $this->productService->store($request->validated());
        return back();
    }
}
