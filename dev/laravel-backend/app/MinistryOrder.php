<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryOrder extends Model
{
    protected $table = 'ministry_orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'credit_id',
        'ministry_id',
        'ministry_request_id',
        'status_id',
        'status'
    ];

    public function credit() {
        $this->hasOne('App\Credit', 'id', 'credit_id');
    }

    public function ministry() {
        $this->hasOne('App\Ministry', 'id', 'ministry_id');
    }

    public function status() {
        $this->hasOne('App\MinistryStatus', 'id', 'status_id');
    }
}
