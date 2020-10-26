<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model 
{
    public $fillable = ['heading','description','features','longitude','latitude','location','price','type'];

    protected $table = 'properties';
    protected $with = [
        'propertyImages', 'propertySpecialities','place','user'
    ];
    
    public function propertyImages() {
        return $this->hasMany('App\Models\PropertyImage', 'property_id', 'id');
    }
    public function propertySpecialities(){
        return $this->hasMany('App\Models\PropertySpeciality', 'property_id', 'id');
    }
    public function place(){
        return $this->belongsTo('App\Models\PropertyLocation','location','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','addedBy','id');
    }
}
