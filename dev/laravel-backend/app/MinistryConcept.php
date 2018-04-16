<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryConcept extends Model
{
    protected $table = 'ministry_concept';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'status'
    ];

    public function detail()
    {
        return $this->hasMany('App\MinistryConceptDetail', 'concept_id', 'id');
    }
}
