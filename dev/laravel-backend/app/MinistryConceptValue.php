<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinistryConceptValue extends Model
{
    protected $table = 'ministry_concept_detail_value';
    protected $primaryKey = 'id';

    protected $fillable = [
        'concept_detail_id',
        'cost',
        'status',
        'created_at',
        'updated_at'
    ];

    public function conceptDetail() {
        return $this->hasOne('App\MinistryConceptDetail', 'id', 'concept_detail_id');
    }
}
