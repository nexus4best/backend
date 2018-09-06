<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
	public $primaryKey = 'CshIP';
	public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'CshIP', 'CshBranch', 'CshDatabaseServerAlone', 'CshName'
    ];	
}
