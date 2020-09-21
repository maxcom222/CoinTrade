<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
	protected $table = 'gateways';
    protected $fillable = array( 'name','gateimg', 'minamo', 'maxamo', 'chargefx','chargepc', 'rate', 'val1', 'val2','val3','currency', 'status');

    public function deposit()
    {
        return $this->hasMany('App\Deposit', 'id', 'gateway_id');
    }
}
