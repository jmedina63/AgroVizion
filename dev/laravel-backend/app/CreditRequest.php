<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditRequest extends Model
{
    protected $table = 'credit_request';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'cultivation_id',
        'hectares',
        'docs_id',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function cultivation()
    {
        return $this->hasOne('App\Cultivation', 'id', 'cultivation_id');
    }

    public function docs()
    {
        return $this->hasOne('App\CreditDocs', 'id', 'docs_id');
    }
}
