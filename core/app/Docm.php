<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docm extends Model
{
    protected $table = 'docms';
    protected $fillable = array( 'user_id','name', 'photo','photo2', 'details', 'ststus');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
