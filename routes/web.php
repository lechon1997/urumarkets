<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//RUTAS USUARIO
route::get('/altausuario','App\Http\Controllers\controllerUsuario@altaUsuario');
route::get('/modificarUsuario','App\Http\Controllers\controllerUsuario@actualizarDatosUsuario');
route::post('/altaUsu','App\Http\Controllers\controladorBD@altaUsu');
route::post('/modificarUsu','App\Http\Controllers\controladorBD@actualizarDatosUsuario');
route::get('/registrarse','App\Http\Controllers\controllerUsuario@registrarse')->middleware('guest');
route::post('autenticar','App\Http\Controllers\controladorBD@autenticarUsuario');
route::post('/cerrarSession','App\Http\Controllers\controllerUsuario@cerrarSession');
route::get('/loginUsuario','App\Http\Controllers\controllerUsuario@loginUser')->name('loginUsuario')->middleware('guest');

//RUTAS USUARIO EMPRESA
route::get('/MostrarModEmpresa','App\Http\Controllers\ControllerEmpresa@MostrarModEmpresa');
route::post('/ModificarEmpresa','App\Http\Controllers\ControllerEmpresa@ModificarEmpresa');
Route::get('/AltaEmpresa','App\Http\Controllers\ControllerEmpresa@altaempresa');
route::post('/altaVendedor','App\Http\Controllers\ControllerEmpresa@altaVendedor');
route::get('/mostrarEmpresas','App\Http\Controllers\ControllerEmpresa@mostrarEmpresas');
route::get('/VerEmpresa/{id}','App\Http\Controllers\ControllerEmpresa@VerEmpresa');
route::get('/VermiPerfil','App\Http\Controllers\ControllerEmpresa@VermiPerfil');
route::get('/buscar/{texto}','App\Http\Controllers\ControllerEmpresa@buscador');
route::get('/desactivarcuenta','App\Http\Controllers\ControllerEmpresa@desactivarcuenta');


//RUTAS PRODUCTO
Route::get('/altaProducto','App\Http\Controllers\controllerProducto@altaProducto');
route::post('/altaProducto','App\Http\Controllers\controllerPublicacion@altaProd');
route::get('/listarProductos','App\Http\Controllers\controllerProducto@listarProductos');
route::get('/listar_productos','App\Http\Controllers\controllerProducto@listaP');
Route::get('/modificarProducto/{idProducto}', 'App\Http\Controllers\controllerProducto@modificarProducto');
Route::post('/modificarProd/{datosPub}', 'App\Http\Controllers\controllerPublicacion@modificarProd');
route::get('/VistaOferta','App\Http\Controllers\controllerProducto@Oferta');
route::get('/MayorMenor','App\Http\Controllers\controllerProducto@OfertaMayorMenor');
route::get('/MenorMayor','App\Http\Controllers\controllerProducto@OfertaMenorMayor');
route::get('/default','App\Http\Controllers\controllerProducto@defecto');
route::get('/producto/{id}','App\Http\Controllers\controllerProducto@verProducto');
route::get('/Carrito','App\Http\Controllers\controllerProducto@verCarrito');
route::get('/aumentar','App\Http\Controllers\ControllerCarrito@incrementar');
route::get('/pijazo','App\Http\Controllers\ControllerCarrito@poronga');
route::get('/borrarTodo','App\Http\Controllers\ControllerCarrito@borrarProductoCarrito');

route::post('/completarCompra', 'App\Http\Controllers\ControllerCarrito@apiMP');
route::post('/process_payment', 'App\Http\Controllers\ControllerCarrito@finalizarCompra');


//RUTAS GENERALES
route::get('/listar_localidades','App\Http\Controllers\controladorBD@listarLocalidades');
route::get('/index','App\Http\Controllers\controllerUsuario@index')->middleware('auth');

