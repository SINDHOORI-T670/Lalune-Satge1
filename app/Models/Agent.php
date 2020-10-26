<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
class Agent extends model
{
    use Notifiable;
    protected $table = 'agents';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $with = [
        'user', 'limit','property'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AgentResetPassword($token));
    }
    public function user(){
        return $this->belongsTo('App\Models\User','userid','id');
    }
    public function limit(){
        return $this->belongsTo('App\Models\PropertyLimit','id','userid');
    }
    public function property(){
        return $this->hasMany('App\Models\Property','addedBy','id')->where("user","agent");
    }
}
