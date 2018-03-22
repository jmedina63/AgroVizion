<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditStatus extends Model
{
    protected $table = 'credit_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'short_desc',
        'appText',
        'colorHEX',
        'status'
    ];
}
