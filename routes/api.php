<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Area
Route::prefix('v1')->group( function ($router) {
	Route::get('area', 'API\AreaController@index');
});

//BrnChoice
Route::prefix('v1')->group( function ($router) {
	Route::get('brnchoice', 'API\BrnchoiceController@index');
	Route::get('brnchoice/{id}', 'API\BrnchoiceController@editChoice');
});