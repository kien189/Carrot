<?php

namespace App\Http\Controllers\Fe;

use App\Events\CommentEvents;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index(Request $request, $id)
    {
        $comment = Comment::create([
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
            'product_id' => $id,
            'customer_id' => Auth::guard('customers')->id(),
        ]);

        broadcast(new CommentEvents($comment));
        // Gửi sự kiện broadcast

        return response()->json(['message' => 'Bình luận thành công', 'comment' => $comment], 200);
    }
}
