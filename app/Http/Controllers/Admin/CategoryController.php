<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $category = Category::where('parent_id' , '=' ,$category->parent_id)->get();
       return view('Admin.Categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            Category::create($req->all());
            return Redirect::route('category.index')->with('success','Thêm danh mục thành công');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error','Thêm danh mục thất bại'.$th->getMessage());
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
    public function edit(Category $category)
    {
        $editCate = Category::find($category->id);
        $cate = Category::where('parent_id' , '=' ,$category->parent_id)->paginate(10);
        return view('Admin.Categories.edit',compact('editCate','cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category->update($request->all());
            return Redirect::route('category.index')->with('success','Cập nhật khóa cha thành công');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error','Cập nhật khóa cha thất bại');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleCate = Category::find($id)->delete();
            return Redirect::route('category.index')->with('succses','Xóa danh mục cha thành công');
        } catch (\Throwable $th) {
            return Redirect::bach()->with('error','Xóa danh mục cha thất bại');
        }

    }
}
