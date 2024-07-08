<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CommentEvents implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
        Log::debug('CommentEvents constructor fired.');
    }

    // public function broadcastOn()
    // {
    //     Log::debug('Broadcasting on channel: comments');
    //     return new Channel('comments');
    // }
    public function broadcastOn()
    {
        Log::debug('Broadcasting on channel: comments');
        return new PresenceChannel('comments');
    }
}
