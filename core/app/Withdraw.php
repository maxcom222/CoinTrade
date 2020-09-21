<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws';
    protected $fillable = array( 'user_id','wdid', 'amount','status');
   

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
