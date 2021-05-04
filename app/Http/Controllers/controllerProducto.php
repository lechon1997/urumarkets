<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Publicacion;

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
        $idProducto = $request->idProducto;
        $producto = Publicacion::select('publicacion.*', 'producto.*')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                //->join('usuario', 'publicacion.usuario_id', '=', 'usuario.id')
                                ->where('producto.producto_id', $idProducto)
                                ->first();
                                echo $producto;                                                                                   
        return view("Producto.modificarProducto")->with('producto', $producto);

    }

    public function listaP(){
        $producto = Publicacion::select('publicacion.*', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                //->join('usuario', 'publicacion.usuario_id', '=', 'usuario.id')
                                ->get();
        return $producto;
    }

    public function modProducto($id){    
        
        $productito = Producto::select('producto.*')
                                ->where('producto.producto_id', '=', $id)
                                ->get();
        return $productito;
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
