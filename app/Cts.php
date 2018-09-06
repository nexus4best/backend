<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cts extends Model
{
	public $primaryKey = 'CtsId';
	public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'CtsId', 'CtsName'
    ];
}
