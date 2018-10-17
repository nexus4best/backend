<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnstatus extends Model
{

	//public $primaryKey = 'AreaId';
	//public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'name', 'service',
    ];	
}
