<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transaction';
    
    protected $fillable = ['userid','money','note','status','admin','updated_at'];
}
