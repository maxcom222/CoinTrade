<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testm extends Model
{
	protected $table = 'testms';
    protected $fillable = array('photo', 'name', 'company', 'star', 'comment');
}
