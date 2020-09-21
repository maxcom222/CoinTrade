<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translog extends Model
{
	protected $table = 'translogs';
    protected $fillable = array('user_id', 'trxid', 'amount', 'balance','type','details');
     
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
