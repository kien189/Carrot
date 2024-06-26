<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $subCate = Category::where('parent_id', '!=', $category->id)->get();
        $Cates = Category::where('parent_id', '=', $category->parent_id)->get();
        return view('Admin.SubCategory.index', compact('subCate', 'Cates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('Admin.SubCategory.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            Category::create($req->all());
            return Redirect::route('subCategory.index')->with('success', 'Thêm mới danh mục con thàng công');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Thêm mới danh mục con thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Category $category)
    {
        $editSubCate = Category::find($id);
        $subCate = Category::where('parent_id', '!=', $category->id)->get();
        $Cates = Category::where('parent_id', '=', $category->parent_id)->get();
        return view('Admin.SubCategory.edit', compact('subCate', 'Cates', 'editSubCate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Category $subCategory)
    {

        try {
            $subCategory->update($req->all());
            return Redirect::route('subCategory.index')->with('success', 'Cập nhật danh mục con thành công !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return Redirect::back()->with('error', 'Cập nhật danh mục con thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleCate = Category::find($id)->delete();
            return Redirect::route('category.index')->with('succses', 'Xóa danh mục con thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return Redirect::back()->with('error', 'Xóa danh mục con thất bại');
        }
    }
}
