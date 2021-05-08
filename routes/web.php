<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


route::get('/MostrarModEmpresa','App\Http\Controllers\ControllerEmpresa@MostrarModEmpresa');
route::post('/ModificarEmpresa','App\Http\Controllers\ControllerEmpresa@ModificarEmpresa');

Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/modificarProducto/{idProducto}', 'App\Http\Controllers\controllerProducto@modificarProducto');
Route::get('/AltaEmpresa','App\Http\Controllers\ControllerEmpresa@altaempresa');
route::post('/altaVendedor','App\Http\Controllers\ControllerEmpresa@altaVendedor');
Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');
route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');
route::post('/altaProducto','App\Http\Controllers\controllerPublicacion@altaProd');
route::get('/listarProductos','App\Http\Controllers\controllerProducto@listarProductos');
route::get('/listar_localidades','App\Http\Controllers\controladorBD@listarLocalidades');
route::get('modificarUsuario','App\Http\Controllers\controllerUsuario@actualizarDatosUsuario');
route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');
route::post('/modificarUsu','App\Http\Controllers\controladorBD@actualizarDatosUsuario');
route::get('/registrarse','App\Http\Controllers\controllerUsuario@registrarse')->middleware('guest');
route::get('/listarProductos','App\Http\Controllers\controllerProducto@listarProductos');
route::get('/listar_productos','App\Http\Controllers\controllerProducto@listaP');
route::post('/cerrarSession','App\Http\Controllers\controllerUsuario@cerrarSession');

route::get('index',function(){
    return view('index');
})->middleware('auth');

route::get('/loginUsuario', function(){
	return view('login2');
})->name('loginUsuario')
  ->middleware('guest');

route::post('auntenticar',function(){

    $credenciales = request()->only('email', 'password');
        if (Auth::attempt($credenciales)) {

            request()->session()->regenerate();
            return redirect('/index');
        }

        return redirect('/loginUsuario');

});
