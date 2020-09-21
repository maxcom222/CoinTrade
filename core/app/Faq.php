<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
   protected $table = 'faqs';
    protected $fillable = array( 'ques', 'ans');
}
