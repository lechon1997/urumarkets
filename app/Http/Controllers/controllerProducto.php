<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;

class controllerProducto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function altaProducto(){
        return view("Producto.altaProducto");
    }

    public function listarProductos(){
        return view("Producto.listarproductos");
    }

    public function modificarProducto(Request $request){

        //datosPublicacion tiene el id de el producto/servicio
        //y si es servicio o producto.
        $datosPublicacion = $request->idProducto;

        //Con explode armo un array separando los datos porque vienen
        //así: 1&producto - 2&servicio.
        $arrayPublicacion = explode("&",$datosPublicacion);

        //Creo dos variables nuevas que van a tomar los valores del array.
        $idPub = $arrayPublicacion[0];
        $tipoPub = $arrayPublicacion[1];

        $idUsuario = Auth::id();

        $publicacion;

        if($tipoPub == "producto"){                    
            $publicacion = Publicacion::select('publicacion.*', 'producto.*')
                                    ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                    ->join('usuario', 'publicacion.usuario_id', '=', 'usuario.id')
                                    ->where('producto.id', $idPub)
                                    ->where('usuario.id', $idUsuario)
                                    ->first();
            $publicacion->tipoPub = "producto";      
        }else{
            $publicacion = Publicacion::select('publicacion.*', 'servicio.*')
                                    ->join('servicio', 'publicacion.id', '=', 'servicio.publicacion_id')
                                    ->join('usuario', 'publicacion.usuario_id', '=', 'usuario.id')
                                    ->where('servicio.id', $idPub)
                                    ->where('usuario.id', $idUsuario)
                                    ->first();   
            $publicacion->tipoPub = "servicio";
        }
      
        return view("Producto.modificarProducto")->with('publicacion', $publicacion);              
    }

    public function listaP(){

        $idUsuario = Auth::id();             
        $productos = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock', 'producto.id')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->join('usuario', 'publicacion.usuario_id', '=',  'usuario.id')
                                ->where('usuario.id', $idUsuario)
                                ->get();

        $servicios = Publicacion::select('publicacion.*','publicacion.id', 'servicio.id')
                                ->join('servicio', 'publicacion.id', '=', 'servicio.publicacion_id')
                                ->join('usuario', 'publicacion.usuario_id', '=',  'usuario.id')
                                ->where('usuario.id', $idUsuario)
                                ->get();        
        
        $publicaciones = [];

        if(count($productos) > 0){
            for($x=0; $x < count($productos); $x++){
                $productos[$x]->esProducto = "producto";
                array_push($publicaciones, $productos[$x]);
            }  
        }
        
        if(count($servicios) > 0){
            for($i=0; $i < count($servicios); $i++){
                $servicios[$i]->esProducto = "servicio";
                array_push($publicaciones, $servicios[$i]);
            }
        }

        return $publicaciones;
    }

    public function modProducto($id){            
        $productito = Producto::select('producto.*')
                                ->where('producto.producto_id', '=', $id)
                                ->get();
        return $productito;
    }

    public function Oferta(){
         $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.oferta', '=' , 1 )
                                ->get();
        return view("Empresa.ofertas")->with('productos',$producto);
    }

    public function defecto(){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                               ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                               ->where('publicacion.oferta', '=' , 1 )
                               ->get();
       return json_encode($producto);
   }

    public function OfertaMayorMenor(){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                               ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                               ->where('publicacion.oferta', '=' , 1 )
                               ->orderBy('publicacion.precio', 'DESC')
                               ->get();
        return json_encode($producto);
       //return view("Empresa.ofertas")->with('productos',$producto);
   }

   public function OfertaMenorMayor(){
    $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                           ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                           ->where('publicacion.oferta', '=' , 1 )
                           ->orderBy('publicacion.precio', 'ASC')
                           ->get();
    return json_encode($producto);
   //return view("Empresa.ofertas")->with('productos',$producto);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
