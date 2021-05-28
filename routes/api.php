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
Route::get('/test-api',function(){
    return ['message' =>'hola'];
});

Route::post('/saludar','App\Http\Controllers\ControladorWebServices@saludar');
Route::post('/altaUsuws','App\Http\Controllers\ControladorWebServices@altaUsuws');
Route::post('/altaempws','App\Http\Controllers\ControladorWebServices@altaEmpws');
Route::get('/getLocalidades','App\Http\Controllers\ControladorWebServices@getLocalidades');
Route::post('/autenticarUsuario','App\Http\Controllers\ControladorWebServices@autenticarUsuario');
Route::post('/actualizarDatosU','App\Http\Controllers\ControladorWebServices@actualizarUsu');
route::post('/altaproductowbs','App\Http\Controllers\ControladorWebServices@altaproductowbs');
