<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'vipshare';
    
    protected $fillable = ['vipid','limit','speed'];
}
