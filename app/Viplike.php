<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viplike extends Model
{
    protected $table = 'viplike';
    
    protected $fillable = [
        'vipid',
        'limit',
        'type',
        'speed'
    ]; 
}
