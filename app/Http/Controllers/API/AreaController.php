<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Area;

class AreaController extends BaseController
{

	public function index()
	{
		$area = Area::all();
		return $this->sendResponse($area->toArray(), 'Area retrieved successfully.');
	}
}