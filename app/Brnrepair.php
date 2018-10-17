<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnrepair extends Model
{

	//public $timestamps = false;
    
    protected $fillable = [
        'BrnCode', 'BrnStatus', 'BrnRepair', 'BrnPos', 'BrnBrand', 
        'BrnModel', 'BrnSerial', 'BrnCause', 'BrnUser', 'DeleteBy', 'delete_date', 'DeleteCause',
        'AcceptBy', 'accept_date', 'created_at', 'updated_at'
    ];	

    public function branch()
    {
    	return $this->hasOne('App\Brnzone', 'BrnCode', 'BrnCode');
    }    

}
