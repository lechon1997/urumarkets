<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        if($request->productosPorPersona == ""){
            $publicacion->limitePorPersona = 0;
        }else{
            $publicacion->limitePorPersona = $request->productosPorPersona;
        }

        if($request->porcentajeOfertaProducto == ""){
            $publicacion->porcentajeOferta = 0;
        }else{
            $publicacion->porcentajeOferta = $request->porcentajeOfertaProducto;
        }
        
        $publicacion->estado = $request->estadoProducto;
        $publicacion->deshabilitado = 0;  
          	  	
        $publicacion->usuario_id = Auth::id();
        
        if(empty($publicacion->usuario_id) || $publicacion->usuario_id == ""){
            $publicacion->usuario_id = $request->usuario_id;
        }
        

        //Para la foto
         if ($request->hasFile('file')) {            
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
         
        return redirect("/altaProducto");        

    }

    public function modificarProd(Request $request){   
        //datosPublicacion tiene el id de el producto/servicio
        //y si es servicio o producto.
        $datosPublicacion = $request->datosPub;

        //Con explode armo un array separando los datos porque vienen
        //así: 1&producto - 2&servicio.
        $arrayPublicacion = explode("&",$datosPublicacion);

        //Creo dos variables nuevas que van a tomar los valores del array.
        $idPub = $arrayPublicacion[0];
        $tipoPub = $arrayPublicacion[1];

        $publicacion = Publicacion::find($idPub);
                          
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
        $publicacion->usuario_id = Auth::id();

        //Para la foto
        if ($request->hasFile('file')) {
            //Borro la imagen que tenía el producto/servicio anteriormente.
            $imagenPublicacion = $publicacion->foto;
            unlink(storage_path("app/public/productos/".$imagenPublicacion));

            //Creo la imagen nueva y la guardo.           
            $nombreFoto = $request->file->hashName();           
            $request->file->store('productos', 'public');
            $publicacion->foto = $nombreFoto;
        }

        //Inserto la publicación a la base de datos.
        $publicacion->save();

        //Pregunto qué tipo de publicación tengo que modificar
        if($tipoPub == "producto"){
            $producto = Producto::find($idPub); 
            $producto->stock = $request->stockProducto;
            $publicacion->productos()->save($producto);    
        }else{
            $servicio = Servicio::find($idPub);
            $publicacion->servicios()->save($servicio);
        }
   
        return redirect('/listarProductos');
        
        //return $publicacion;


    }

    public function store(Request $request)
    {
        //
    }


}
