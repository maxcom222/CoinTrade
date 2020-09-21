<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paym extends Model
{
    protected $table = 'payms';
    protected $fillable = array( 'payment');
}
