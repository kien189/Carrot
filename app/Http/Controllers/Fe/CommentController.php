<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $req ,$id)
    {
        $data= [
            'rating'     =>$req->rating,
            'product_id'  => $id,
            'customer_id' =>Auth::guard('customers')->id(),
            'content'      => $req->content,
        ];
        $comment = Comment::create($data);
       return redirect()->back()->with('success','binh luan thanh cong');
    }
}
