<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnzone extends Model
{

	public $primaryKey = 'BrnCode';
	public $incrementing = false;
	public $timestamps = false;
    
    public function area()
    {
    	return $this->hasOne('App\Area', 'AreaId', 'AreaId');
    }

    public function cts()
    {
    	return $this->hasOne('App\Cts', 'CtsId', 'CtsId');
    }    

    public function province()
    {
    	return $this->hasOne('App\Province', 'PrvCode', 'BrnPrv');
    }      

    public function cashier()
    {
    	return $this->hasMany('App\Cashier', 'CshBranch', 'BrnCode');
    }      

}
