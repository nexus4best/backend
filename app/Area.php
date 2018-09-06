<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

	public $primaryKey = 'AreaId';
	public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'AreaId', 'AreaName', 'AreaPhone'
    ];	
}
