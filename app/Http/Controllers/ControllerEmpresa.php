<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Hash;

class ControllerEmpresa extends Controller
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

    public function AltaEmpresa(){
    	return view("Empresa.altaempresa");
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

    public function altaVendedor(Request $request){
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

        $usuario = new Usuario;
        $usuario->primerNombre = $request->pnombre;
        $usuario->segundoNombre = $request->snombre;
        $usuario->primerApellido = $request->papellido;
        $usuario->segundoApellido = $request->sapellido;
        $usuario->password = Hash::make($request->pass);
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->idDepartamento = $request ->Departamento;
        $usuario->idLocalidad = $request->localidad; // localidad falta
        $usuario->save();

        $vendedor = new Vendedor;
        $vendedor->RUT = $request->Rut;
        $vendedor->razonSocial = $request->razonsocial;
        $vendedor->nombreFantasia = $request->nombrefantasia;
        $vendedor->tipoOrganizacion = $request->tipoOrg;
        $vendedor->rubro = $request->rubro;
        $vendedor->telefonoEmpresa = $request->telefonoEmpresa;
        $vendedor->direccion = $request->direccion;
        $vendedor->descripcion = $request->Descripcion;
        
        $usuario->vendedores()->save($vendedor);
   
        return redirect('/loginUsuario');

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
