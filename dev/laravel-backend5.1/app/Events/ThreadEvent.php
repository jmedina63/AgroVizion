<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ThreadEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    
    
    public $thread;
    public $user;
    
    public function __construct($temp)
    {
        $this->thread = $temp['thread'];
        $this->user = $temp['user'];
    }


    public function broadcastOn()
    {
        return [$this->user];
    }

    public function broadcastAs()
    {
        return 'thread.new';
    }
}
