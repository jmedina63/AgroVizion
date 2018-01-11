<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $from;
    public $user_id;
    public $to;
    public $text;
    public $timestamp;
    public $avatar_url;
    public $thread;
    public $unique_id;
    public $msg_index;
    public $sending;

    public $file_name;
    public $file_size;
    public $file_type;

    
    public function __construct($message)
    {
        $this->from = $message['from'];
        $this->to = $message['to'];
        $this->user_id = $message['user_id'];
        $this->text = $message['text'];
        $this->timestamp = $message['timestamp'];
        $this->avatar_url = $message['avatar_url'];
        $this->thread = $message['thread'];
        $this->unique_id = $message['unique_id'];
        $this->msg_index = $message['msg_index'];
        $this->sending = $message['sending'];
        
        $this->file_name = $message['file_name'];
        $this->file_size = $message['file_size'];
        $this->file_type = $message['file_type'];
    }


    public function broadcastOn()
    {
//        return ['yourprivatehashedchannelid'];
        return [$this->thread];
    }

    public function broadcastAs()
    {
        return 'messages.new';
    }
}
