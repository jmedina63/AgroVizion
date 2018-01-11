<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Thread()
    {
        return $this->belongsTo('App\Thread');
    }

    protected $fillable = [
        'text','user_id','thread_id','file_name','file_size','file_type'
    ];
    
}
