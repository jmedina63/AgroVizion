<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Credit;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'credit_id',
        'description',
        'type',
        'amount'
    ];

    public function credit() {
        return $this->hasOne('App\Credit', 'id', 'credit_id');
    }
}
