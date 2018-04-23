<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryCashRequest extends Model
{
    protected $table = 'ministry_cash_request';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'rent',
        'rentDate',
        'ground',
        'groundDate',
        'sowing',
        'sowingDate',
        'labors',
        'laborsDate',
        'harvest',
        'harvestDate',
        'diverse',
        'diverseDate'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
