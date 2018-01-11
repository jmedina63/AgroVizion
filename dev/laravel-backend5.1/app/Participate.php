<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
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
        'last_read','user_id','thread_id'
    ];
    
}
