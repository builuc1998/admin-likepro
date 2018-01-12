<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vipcomment extends Model
{
    protected $table = 'vipcomment';
    
    protected $fillable = ['vipid','limit','content','speed'];
}
