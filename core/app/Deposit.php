<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $fillable = array( 'user_id','gateway_id','amount', 'status','trxid','try','bcam','bcid');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gateway()
    {
        return $this->belongsTo('App\Gateway');
    }
}
