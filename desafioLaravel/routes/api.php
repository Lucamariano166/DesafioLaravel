<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function() {
    return ['chegamos até aui' =>'SIM'];
});
*/




Route::apiResource('manutencoes', 'App\Http\Controllers\api\ManutencaoController');
Route::apiResource('veiculos', 'App\Http\Controllers\api\VeiculosController');
Route::get('search/{placa}', 'App\Http\Controllers\api\ApiController@searchByPlaca');


