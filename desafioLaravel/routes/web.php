<?php

use App\Http\Controllers\ShowManutencoes;
use App\Http\Controllers\ShowVeiculos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/inicio', [UserController::class, 'index']);


//Route::get('/Manutencao', [VeiculosController::class, 'Manutencao']);
//Route::get('/Veículos', [VeiculosController::class, 'Veículos']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
    Route::get('/manutencao', [ShowManutencoes::class, 'index']);
    Route::get('/veiculos', [ShowVeiculos::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout']);

});
