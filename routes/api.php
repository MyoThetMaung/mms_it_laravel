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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/items','ItemApiController@index');                     //need to write route "/api/items" 
Route::get('/items/{id}','ItemApiController@show');
Route::post('/items','ItemApiController@store');

Route::apiResource('/photo','PhotoApiController');