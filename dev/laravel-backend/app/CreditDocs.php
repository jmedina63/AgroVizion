<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditDocs extends Model
{
    protected $table = 'credit_docs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'card_id_name',
        'card_id_size',
        'card_id_directory',
        'doc_address_name',
        'doc_address_size',
        'doc_address_directory',
        'expiration',
        'status'
    ];
}
