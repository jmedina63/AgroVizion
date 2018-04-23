<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryStatus extends Model
{
    protected $table = 'ministry_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ministry_id',
        'description',
        'short_desc',
        'appText',
        'colorHEX',
        'status'
    ];

    public function ministry() {
        return $this->hasOne('App\Ministry', 'id', 'ministry_id');
    }
}
