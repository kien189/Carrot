<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::inRandomOrder()->paginate(3);
        return view('Fe.Blog.index', ['blog' => $blog]);
    }

    public function blogDetail($slug, Blog $blog)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blog->increment('views_count');
        $blogs = Blog::where('id', '!=', $blog->id)->inRandomOrder()->limit(2)->get();
        return view('Fe.Blog.detail', ['blog' => $blog, 'blogs' => $blogs]);
    }

    public function getSearch(Request $req)
    {
        $search = $req->input('search');
        $searchUrl = str_replace(' ', '-', $search);
        return redirect()->route('blogSearch', ['search' => $searchUrl]);
    }

    public function blogSearch(Request $req, $search)
    {
        $search = str_replace('-', '', $search);
        $blog = Blog::where('title','LIKE', "%{$search}%")->get();
        return view('Fe.Blog.index', ['blogSearch' => $blog]);
    }
}
