<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistrySuppliesRequest extends Model
{
    protected $table = 'ministry_supplies_request';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'phosphate',
        'phosphateDate',
        'urea',
        'ureaDate',
        'ammonia',
        'ammoniaDate'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
