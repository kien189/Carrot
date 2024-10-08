<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Storage;

class BlogControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
     protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function index()
    {
        $blog = Blog::orderBy('views_count', 'desc')->get();
        return view('Admin.Blog.index', ['blog' => $blog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $cate = Category::where('parent_id', '=', $category->parent_id)->get();
        return view('Admin.Blog.add', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $user_id = auth('users')->id();
        $fileName = $this->imageUploadService->handleImageUploadAndMerge($req,'public/blogs','photo');
        try {
            $data = $req->all();
            $data['user_id'] = $user_id;
            $blog = Blog::create($data);
            return redirect()->route('blog.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back();
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
        $cate = Category::where('parent_id', '=', $category->parent_id)->get();
        $blog = Blog::find($id);
        return view('Admin.Blog.edit', compact('cate', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Blog $blog)
    {   try {
        $this->imageUploadService->updateImage($req,$blog,'public/blogs','photo');
        $blog->update($req->all());
        return redirect()->route('blog.index');
    } catch (\Throwable $th) {
        dd($th->getMessage());
        return redirect()->route('blog.index');
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id)->delete();
        return redirect()->back();
    }
}
