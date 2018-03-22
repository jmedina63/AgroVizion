<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivation extends Model
{
    protected $table = 'cultivations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'key',
        'description',
        'status'
    ];
}
