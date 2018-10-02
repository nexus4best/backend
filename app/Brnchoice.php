<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnchoice extends Model
{
	//public $primaryKey = 'CshIP';
	//public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];	
}
