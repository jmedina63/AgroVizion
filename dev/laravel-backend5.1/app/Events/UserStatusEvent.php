<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserStatusEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
       
    }

    public function broadcastOn()
    {
        return ['user.status'];
    }

    public function broadcastAs()
    {
        return 'user.status';
    }
}
