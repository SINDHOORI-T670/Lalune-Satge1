<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySpeciality extends Model
{
    
    protected $table = 'property_specialities';
    public function icon(){
        return $this->belongsTo('App\Models\Icon','id','icon');
    }
}
