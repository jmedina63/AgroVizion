<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryConceptDetail extends Model
{
    protected $table = 'ministry_concept_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'concept_id',
        'description',
        'status'
    ];

    public function concept()
    {
        return $this->hasOne('App\MinistryConcept', 'id', 'concept_id');
    }
}
