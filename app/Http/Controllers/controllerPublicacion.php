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
    	$publicacion->descripcion = $request->descripcionProducto;

        //Si el checkbox está chequeado viene como "on"//
        if($request->checkboxOferta == "on"){
            $publicacion->oferta = 1;
        }else{
            $publicacion->oferta = 0;
        }
        
        if($request->checkboxTienePrecio == "on"){
            //Si el producto tiene precio entonces tomo los valores que vienen por parámetro.
            $publicacion->conPrecio = 1;
            $publicacion->tipoMoneda = $request->tipoMoneda;
            $publicacion->precio = $request->precioProducto;
        }else{
            //Si el producto no tiene precio seteo los parametros a "".
            $publicacion->conPrecio = 0;
            $publicacion->tipoMoneda = "";
            $publicacion->precio = 0;
        }

        $publicacion->estado = $request->estadoProducto;
    	$publicacion->limitePorPersona = $request->productosPorPersona;
    	$publicacion->foto = "prueba";
        $publicacion->usuario_id = 1;

        //Inserto la publicación a la base de datos.
    	$publicacion->save();

    	$producto = new Producto;
    	$producto->stock = $request->stockProducto;

    	$publicacion->productos()->save($producto);
   
        return redirect('/altaProducto');

    }

    public function modificarProd(Request $request){
        $publicacionID = $request->idPublicacion;
        $productoID = $request->idProducto;

        

    }


}
