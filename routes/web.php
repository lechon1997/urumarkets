<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/AltaEmpresa','App\Http\Controllers\ControllerEmpresa@altaempresa');

Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "hola";
});



route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');

route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');

route::post('/altaProducto','App\Http\Controllers\controllerPublicacion@altaProd');

route::get('/listar_localidades','App\Http\Controllers\controladorBD@listarLocalidades');