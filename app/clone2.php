<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clone2 extends Model
{
    protected $table = 'clone';
    
    protected $fillable = [
        'uid',
        'email',
        'password',
        'cookie',
        'token',
        'note',
        'birthday',
        'lastname',
        'firstname',
        'country',
        'cmtid',
        'photoid',
        'status',
        'linksp',
        'created_at',
        'updated_at',
    ];
}
