<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'coins';
    protected $fillable = array( 'id','coinid', 'name', 'symbol', 'price');

    public function coinwallet()
    {
        return $this->hasMany('App\Coinwallet','id','coin_id');
    }
}
