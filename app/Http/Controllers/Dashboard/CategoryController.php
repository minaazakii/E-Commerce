<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $mainCategories = Category::where('parent_id', null)->orWhere('parent_id', 0)->get();
        $categories = Category::paginate(5);
        return view('dashboard.categories.index',
        [
            'mainCategories'=>$mainCategories,
            'categories'=>$categories
        ]);
    }
    public function edit()
    {
        return view('dashboard.categories.edit');
    }
    public function delete(Request $request)
    {
        Category::find($request->id)->delete();
        return back()->with('success','Category delete');
    }
    public function getAll()
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
                return ($row->parent == 0) ? "قسم رئيسي" : $row->parents->name;
            })
            ->rawColumns(['parent','action','action2'])
            ->make(true);
    }
}
