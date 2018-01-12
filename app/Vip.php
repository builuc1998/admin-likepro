<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    protected $table = 'vip';
    
    
    protected $fillable = [
         'uid',
         'action',
         'price',
         'time',
         'user_id',
    ];
}
