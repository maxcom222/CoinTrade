<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interf extends Model
{
    protected $table = 'interfs';
    protected $fillable = array( 'abdesc', 'stdesc', 'sthead', 'ftcon');
}
