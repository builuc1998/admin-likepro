<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clone2 extends Model
{
    protected $table = 'clone';
    
    protected $fillable = [
    		'name',
    		'uid',
    		'email',
    		'password',
    		'cookie',
    		'token',
    		'status',
    		'created_at',
    		'updated_at',
    		'note',
    		'lastname',
    		'firstname',
            'birthday',
            'sex',
            'linksp',
            'used',
            'xoaytua'
    	];
        public $timestamps = false;

}
