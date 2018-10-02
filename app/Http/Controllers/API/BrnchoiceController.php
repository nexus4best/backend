<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Brnchoice;

class BrnChoiceController extends BaseController
{

	public function index()
	{
		$brnchoice = BrnChoice::orderBy('id', 'ASC')->get();
		return $this->sendResponse($brnchoice->toArray(), 'Brnchoice retrieved successfully.');
	}

	public function editChoice(Request $request, $id)
	{
		//$article = Article::findOrFail($id);
		$brnchoice = BrnChoice::findOrFail($id);
		return $brnchoice;
/*		if(!$brnchoice){
		$response = [
            'success' => true,
        ];
			return response()->json($response, 200);
		}else {
			return $this->sendResponse($brnchoice->toArray(), 'Brnchoice retrieved successfully.');
		}
*/
		
	}	
}