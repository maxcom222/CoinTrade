<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $table = 'stats';
    protected $fillable = array( 'image','small', 'large');
}
