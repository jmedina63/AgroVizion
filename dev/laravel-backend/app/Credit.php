<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credits';
    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
        'user_id',
        'status_id',
        'amount',
        'expiration',
        'status'
    ];

    public function request()
    {
        return $this->hasOne('App\CreditRequest', 'id', 'request_id');
    }

    public function creditStatus()
    {
        return $this->hasOne('App\CreditStatus', 'id', 'status_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
