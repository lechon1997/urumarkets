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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "hola";
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');
route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');
