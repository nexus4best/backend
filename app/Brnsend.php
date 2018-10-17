<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnsend extends Model
{

	//public $timestamps = false;
    
    protected $fillable = [
        'SendBrand', 'SendModel', 'SendSerial', 'created_at', 'updated_at',
        'SendCts', 'SendBy', 'SendComment'
    ];	  

}
