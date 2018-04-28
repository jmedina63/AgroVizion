<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'extension',
        'filesize',
        'base64',
        'order'
    ];
}
