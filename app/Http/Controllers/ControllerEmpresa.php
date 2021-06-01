<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vendedor;
use App\Models\Localidad;
use App\Models\Departamento;
use App\Models\Publicacion;
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

    public function VerEmpresa($id){
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.usuario_id', '=' , $id)
                                ->get();
        $usuario = Usuario::find($id);
        $vendedor = Vendedor::find($id);
        $localidad = Localidad::find($usuario->idLocalidad);
        $departamento = Departamento::find($usuario->idDepartamento);
        return view("Empresa.VerEmpresa")->with('vendedor',$vendedor)
                                         ->with('usuario',$usuario)
                                         ->with('localidad',$localidad)
                                         ->with('departamento',$departamento)
                                         ->with('productos',$producto);
    }

    public function VermiPerfil(){
        $idUsu = Auth::id();
        $producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.usuario_id', '=' , $idUsu)
                                ->get();
        $usuario = Usuario::find($idUsu);
        $vendedor = Vendedor::find($idUsu);
        $tipovistaperfil = "verperfil";
        $localidad = Localidad::find($usuario->idLocalidad);
        $departamento = Departamento::find($usuario->idDepartamento);
        return view("Empresa.VerEmpresa")->with('vendedor',$vendedor)
                                         ->with('usuario',$usuario)
                                         ->with('localidad',$localidad)
                                         ->with('departamento',$departamento)
                                         ->with('tipovistaperfil',$tipovistaperfil)
                                         ->with('productos',$producto);
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
        $empresas = Usuario::select('usuario.*','vendedor.*','departamento.nombre AS dnombre','localidad.nombre AS lnombre')
                                ->join('vendedor', 'usuario.id', '=', 'vendedor.id')
                                ->join('departamento', 'usuario.idDepartamento', '=', 'departamento.id')
                                ->join('localidad', 'usuario.idLocalidad', '=', 'localidad.id')
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

        $usuario->idLocalidad = $request->localidad; 
        if ($request->hasFile('file')) {
            //$destino = 'storage';
            $nombreFoto = $request->file->hashName();           
            $request->file->store('empresa', 'public');
            $usuario->imagen = $nombreFoto;
        }

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
        if ($request->hasFile('file')) {
            //$destino = 'storage';
            $nombreFoto = $request->file->hashName();           
            $request->file->store('empresa', 'public');
            $usuario->imagen = $nombreFoto;
        }
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
