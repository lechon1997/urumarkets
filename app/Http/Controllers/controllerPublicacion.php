<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacion;
use App\Models\Producto;


class controllerPublicacion extends Controller
{

    public function altaProd(Request $request){
        /*$validator = Validator::make($request->all(), [
        'titulo' => 'required|max:255',    
        //'oferta' => 'required',
        'tipoMoneda' => 'required',
        'precioProducto' => 'required',
        'descripcionProducto' => 'required|max:500'
        ]);

        if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    	}*/

    	$publicacion = new Publicacion;
    	$publicacion->titulo = $request->nombreProducto;
    	$publicacion->oferta = $request->oferta;
    	$publicacion->tipoMoneda = $request->tipoMoneda;
    	$publicacion->estado = 0;
    	$publicacion->conPrecio = 0;
    	$publicacion->oferta = 0;
    	$publicacion->limitePorPersona = 10;
    	$publicacion->foto = "pingo";
    	$publicacion->precio = $request->precioProducto;
    	$publicacion->descripcion = $request->descripcionProducto;
    	$publicacion->save();

    	$producto = new Producto;
    	$producto->stock = 10;

    	$publicacion->productos()->save($producto);
   
        return redirect('/altaProducto');

    }

}
