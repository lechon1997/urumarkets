<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

    public function MostrarModEmpresa(){
        $idUsu = Auth::id();

        $usuario = Usuario::find($idUsu);
        $vendedor = Vendedor::find($idUsu);
        //echo $usuario;
        //echo $vendedor;
        return view("Empresa.modificarEmpresa")->with('vendedor',$vendedor)
                                               ->with('usuario',$usuario);

        //value="{{ $vendedor->razonSocial }}"
    }
    public function VerEmpresa(){
        return view("Empresa.VerEmpresa");
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

    public function mostrarEmpresas(){
        $empresas = Vendedor::select('vendedor.*')
                                ->get();
        return view("Empresa.listarempresas")->with('empresas',$empresas);
    }
    

    public function altaVendedor(Request $request){

        $usuario = new Usuario;
        $usuario->primerNombre = $request->pnombre;
        if($request->snombre == null){
            $usuario->segundoNombre = "";
        }else{
            $usuario->segundoNombre = $request->snombre;
        }
        $usuario->segundoNombre = $request->snombre;
        $usuario->primerApellido = $request->papellido;
        $usuario->segundoApellido = $request->sapellido;
        $usuario->password = Hash::make($request->pass);
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->idDepartamento = $request->Departamento;
        $usuario->idLocalidad = $request->localidad; 
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

    public function ModificarEmpresa(Request $request)
    {
        $idUsu = Auth::id();

        $usuario = Usuario::find($idUsu);
        $usuario->primerNombre = $request->pnombre;
        if($request->snombre == null){
            $usuario->segundoNombre = "";
        }else{
            $usuario->segundoNombre = $request->snombre;
        }
        $usuario->primerApellido = $request->papellido;
        $usuario->segundoApellido = $request->sapellido;
        $usuario->password = Hash::make($request->pass);
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->idDepartamento = $request->Departamento;
        $usuario->idLocalidad = $request->localidad;
        $usuario->save();

        $vendedor = Vendedor::find($idUsu);
        $vendedor->RUT = $request->Rut;
        $vendedor->razonSocial = $request->razonsocial;
        $vendedor->nombreFantasia = $request->nombrefantasia;
        $vendedor->tipoOrganizacion = $request->tipoOrg;
        $vendedor->rubro = $request->rubro;
        $vendedor->telefonoEmpresa = $request->telefonoEmpresa;
        $vendedor->direccion = $request->direccion;
        $vendedor->descripcion = $request->Descripcion;
        $vendedor->save();
        
        return redirect('/index');
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
