<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


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

        if($publicacion->limitePorPersona == ""){
            $publicacion->limitePorPersona = 0;
        }else{
            $publicacion->limitePorPersona = $request->productosPorPersona;
        }

        $publicacion->porcentajeOferta = $request->porcentajeOfertaProducto;   
        $publicacion->estado = $request->estadoProducto;    	  	
        $publicacion->usuario_id = Auth::id();

        //Para la foto
         if ($request->hasFile('file')) {
            //$destino = 'storage';
            $nombreFoto = $request->file->hashName();           
            $request->file->store('productos', 'public');
            $publicacion->foto = $nombreFoto;
         }


        //Inserto la publicación a la base de datos.  	
        $publicacion->save();

        if($request['publicacion'] == 'productito'){
            //Si el usuario seleccionó un producto.
            $producto = new Producto;
            $producto->stock = $request->stockProducto;                
            $producto->publicacion_id = $publicacion->getKey();
            $publicacion->productos()->save($producto);
        }else{
            //Si el usuario seleccionó un servicio.
            $servicio = new Servicio;            
            $servicio->publicacion_id = $publicacion->getKey();
            $publicacion->servicios()->save($servicio);
        }
        
 
        //return redirect(); 
        

    }



    public function modificarProd(Request $request){
        $publicacionID = $request->idPublicacion;
        $productoID = $request->idProducto; 

        $publicacion = Publicacion::find($publicacionID);
        $producto = Producto::find($productoID);

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

        $publicacion->porcentajeOferta = $request->porcentajeOfertaProducto;
        $publicacion->estado = $request->estadoProducto;
        $publicacion->limitePorPersona = $request->productosPorPersona;      
        $publicacion->foto = "prueba";
        $publicacion->usuario_id = 1;

        //Inserto la publicación a la base de datos.
        $publicacion->save();

        $producto->stock = $request->stockProducto;

        $publicacion->productos()->save($producto);
   
        return redirect('/listarProductos');

    }

    public function store(Request $request)
    {
        //
    }


}
