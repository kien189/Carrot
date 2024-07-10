<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CommentEvents implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
        // Chỉ log các giá trị cụ thể, ví dụ: ID của comment
        Log::info("Broadcasting comment with ID: {$this->comment}");
    }

    public function broadcastOn()
    {
        return new Channel('comment');
    }
}
