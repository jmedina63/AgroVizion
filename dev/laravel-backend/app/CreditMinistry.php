<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditMinistry extends Model
{
    protected $table = 'credit_ministry';
    protected $primaryKey = ['credit_id', 'ministry_id'];

    protected $fillable = [
        'credit_id',
        'ministry_id',
        'amount',
        'status'
    ];

    public function credit()
    {
        return $this->hasOne('App\Credit', 'id', 'credit_id');
    }

    public function ministry()
    {
        return $this->hasOne('App\Ministry', 'id', 'ministry_id');
    }
}
