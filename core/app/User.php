<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','username','mobile','balance','tauth','tfver','status','emailv','smsv','vsent','vercode','secretcode','docv','refid'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function deposit()
    {
        return $this->hasMany('App\Deposit','id','user_id');
    }

    public function coinwallet()
    {
        return $this->hasMany('App\Coinwallet','id','user_id');
    }
    public function translog()
    {
        return $this->hasMany('App\Translog','id','user_id');
    }
    public function convert()
    {
        return $this->hasMany('App\Convert','id','user_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction','id','user_id');
    }
    public function address()
    {
        return $this->hasMany('App\Address','id','user_id');
    }
  
    public function withdraw()
    {
        return $this->hasMany('App\Withdraw','id','user_id');
    }
    public function docm()
    {
        return $this->hasOne('App\Docm', 'id', 'user_id');
    }
}
