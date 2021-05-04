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

//El primer route es para ir a la vista de "Alta Producto", el segundo route es para ir a la función que lo da de alta.
Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');
route::post('/altaProducto','App\Http\Controllers\controllerPublicacion@altaProd');

//El primer route es para ir a la vista de "Listar Productos", el segundo route es para ir a la función que retorna los productos.
route::get('/listarProductos','App\Http\Controllers\controllerProducto@listarProductos');
route::get('/listar_productos','App\Http\Controllers\controllerProducto@listaP');

//El primer route es para ir a la vista de "Modificar Producto", el segundo route es para ir a la función que lo modifica.
Route::get('/modificarProducto/id={idProducto}', 'App\Http\Controllers\controllerProducto@modificarProducto');
Route::post('/modificarProd/idProd={idProducto}/idPub={idPublicacion}', 'App\Http\Controllers\controllerPublicacion@modificarProd');

Route::get('/AltaEmpresa','App\Http\Controllers\ControllerEmpresa@altaempresa');
route::post('/altaVendedor','App\Http\Controllers\ControllerEmpresa@altaVendedor');
route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');
route::get('/listarProductos','App\Http\Controllers\controllerProducto@listarProductos');
route::get('/listar_localidades','App\Http\Controllers\controladorBD@listarLocalidades');
route::get('modificarUsuario','App\Http\Controllers\controllerUsuario@actualizarDatosUsuario');
route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');
route::post('/modificarUsu','App\Http\Controllers\controladorBD@actualizarDatosUsuario');
route::get('/registrarse','App\Http\Controllers\controllerUsuario@registrarse');
route::post('/logear','App\Http\Controllers\ControladorLogin@authenticate');
