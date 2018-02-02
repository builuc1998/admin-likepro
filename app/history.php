<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'history';
    
    protected $fillable = ['userid','postid','type','status','content','updated_at','me','dachay','tong','uid'];
}
