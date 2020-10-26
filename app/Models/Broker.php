<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\BrokerResetPassword;
use Illuminate\Notifications\Notifiable;

class Broker extends Model
{
    use Notifiable;
    
    protected $table = 'brokers';

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new BrokerResetPassword($token));
    }
    public function user(){
        return $this->belongsTo('App\Models\User','userid','id');
    }
    public function limit(){
        return $this->belongsTo('App\Models\PropertyLimit','id','userid');
    }
}
