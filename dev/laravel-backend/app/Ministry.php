<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $table = 'ministry';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'status'
    ];
}
