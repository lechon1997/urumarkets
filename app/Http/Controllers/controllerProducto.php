<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Publicacion;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Servicio;
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
        $usuario = Auth::user();
        return view("Producto.altaProducto")->with('isadmin', $usuario->isadmin);
    }

    public function listarProductos(){
        $usuario = Auth::user();
        return view("Producto.listarproductos")->with("isadmin", $usuario->isadmin());
    }

    public function verCarrito(){
        $datos = array();
        $lista = Session::get('cart');
        
        if(Session::exists('cart')){
            foreach($lista as $producto){
                $dato = array("id"=>$producto[0],"titulo" => $producto[3],"precio" => $producto[2],
                    "cantidad" => $producto[1],"total" => $producto[4]);
                array_push($datos,$dato);                        
            }
        }
        
        return view("Producto.carrito")->with('datos',$datos)
        ->with('isadmin', Auth::user()->isadmin);
    }

    public function verProducto($id){
        $publicacion = Publicacion::find($id);
        $descontar =  ($publicacion->precio * $publicacion->porcentajeOferta)/100;
        $publicacion->precioConDesc =round($publicacion->precio - $descontar);

        $publicaciones = Publicacion::select('publicacion.*')
                                    ->where('publicacion.usuario_id', '=' ,$publicacion->usuario_id)
                                    ->where('publicacion.id', '!=' ,$publicacion->id)
                                    ->get();

        $empresa = Vendedor::find($publicacion->usuario_id);

        if(empty(Auth::user())){
           return view("Producto.verproducto")->with('datos',$publicacion)
           ->with('empresa', $empresa)
           ->with('productos', $publicaciones)
           ->with('isadmin', 2);
        }

        return view("Producto.verproducto")->with('datos',$publicacion)
        ->with('empresa', $empresa)
        ->with('productos', $publicaciones)
        ->with('isadmin', Auth::user()->isadmin);
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

        return view("Producto.modificarProducto")->with('publicacion', $publicacion)   
        ->with('isadmin', Auth::user()->isadmin);           
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
        $publicaciones = Publicacion::select('publicacion.*')
        ->where('publicacion.oferta', '=' , 1 )
        ->get();

        $usuario = Auth::user();
        if(empty($usuario)){
            return view("Empresa.ofertas")->with('productos',$publicaciones)
            ->with('isadmin', 2);
        }

        return view("Empresa.ofertas")->with('productos',$publicaciones)
        ->with('isadmin', $usuario->isadmin);
    }

    public function defecto(){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
        ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
        ->where('publicacion.oferta', '=' , 1 )
        ->where('publicacion.deshabilitado', '=' , 0 )
        ->get();
        $sizeproducto = $producto->count();
        if($sizeproducto == 0){
            return null;
        }
        return json_encode($producto);
    }

    public function OfertaMayorMenor(){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
        ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
        ->where('publicacion.oferta', '=' , 1 )
        ->where('publicacion.deshabilitado', '=' , 0 )
        ->orderBy('publicacion.precio', 'DESC')
        ->get();

        $sizeproducto = $producto->count();
        if($sizeproducto == 0){
            return null;
        }

        return json_encode($producto);
       //return view("Empresa.ofertas")->with('productos',$producto);
    }

    public function OfertaMenorMayor(){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
        ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
        ->where('publicacion.oferta', '=' , 1 )
        ->where('publicacion.deshabilitado', '=' , 0 )
        ->orderBy('publicacion.precio', 'ASC')
        ->get();
        $sizeproducto = $producto->count();
        if($sizeproducto == 0){
            return null;
        }
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
