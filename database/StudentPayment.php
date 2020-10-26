<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table='student_payment';
    
    protected $with = ['student.institution','student.classes','student.subclasses'];

    public function student(){
        return $this->belongsTo('App\Models\Students', 'studentId', 'id');
    }
}