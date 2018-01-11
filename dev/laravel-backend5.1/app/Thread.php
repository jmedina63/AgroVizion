<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function Message()
    {
        return $this->hasMany('App\Message');
    }
    public function Participate()
    {
        return $this->hasMany('App\Participate');
    }
    
    protected $fillable = [
        'subject','type'
    ];
}
