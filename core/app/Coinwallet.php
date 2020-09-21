<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coinwallet extends Model
{
   protected $table = 'coinwallets';
   protected $fillable = array( 'coin_id', 'user_id', 'balance');

   public function user()
   {
      return $this->belongsTo('App\User');
   }

   public function coin()
   {
      return $this->belongsTo('App\Coin');
   }
}
