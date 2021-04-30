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
route::post('/altaVendedor','App\Http\Controllers\ControllerEmpresa@altaVendedor');

Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "hola";
});

route::get('/index', function(){
	return view('index');
});

route::get('/loginUsuario', function(){
	return view('login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');

route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');

route::post('/altaProducto','App\Http\Controllers\controllerPublicacion@altaProd');

route::get('/registrarse','App\Http\Controllers\controllerUsuario@registrarse');

route::get('/listarProductos','App\Http\Controllers\controllerPublicacion@listarProductos');

route::get('/listar_localidades','App\Http\Controllers\controladorBD@listarLocalidades');