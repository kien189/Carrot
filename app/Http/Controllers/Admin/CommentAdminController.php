<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $productIdsWithcomment = Comment::distinct()->pluck('product_id')->unique();

    //     // Lấy danh sách các sản phẩm theo ID đã có comment
    //     $productsWithcomment = Product::whereIn('id', $productIdsWithcomment)
    //         ->withCount('ratings')
    //         ->get();
    //         // dd($productIdsWithcomment);
    //     return view('Admin.comment.index', compact('productsWithcomment'));
    // }

    public function index(Product $product)
    {
        // Lấy tất cả bình luận của sản phẩm với id tương ứng
        $productsWithcomment = Product::join('comment', 'products.id', '=', 'comment.product_id')
            ->select('products.*')
            ->distinct()
            ->get();
        // dd($productsWithcomment);
        return view('Admin.Comments.index', compact('productsWithcomment'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Lấy tất cả bình luận liên quan đến sản phẩm của bình luận hiện tại
        $comments = Comment::where('product_id', $product->id)->get();
        return view('Admin.Comments.show',compact('comments'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
