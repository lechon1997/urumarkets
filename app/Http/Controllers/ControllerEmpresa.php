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
use Illuminate\Support\Facades\Session;

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
        $localidad = Localidad::find($usuario->idLocalidad);
        //echo $usuario;
        //echo $vendedor;
        return view("Empresa.modificarEmpresa")->with('vendedor',$vendedor)
                                               ->with('usuario',$usuario)
                                               ->with('localidad',$localidad)
                                               ->with('isadmin', $usuario->isadmin);

        //value="{{ $vendedor->razonSocial }}"
    }

    public function VerEmpresa($id){
        $idUsu = Auth::user();
        $publicaciones = Publicacion::select('publicacion.*')
                            ->where('publicacion.usuario_id', '=' ,$id)
                            ->orderBy('publicacion.titulo', 'ASC')
                            ->get();

        /*$producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.usuario_id', '=' , $id)
                                ->get();*/
        $usuario = Usuario::find($id);
        $vendedor = Vendedor::find($id);
        $localidad = Localidad::find($usuario->idLocalidad);
        $departamento = Departamento::find($usuario->idDepartamento);

        if(empty(Auth::user())){
            return view("Empresa.VerEmpresa")->with('vendedor',$vendedor)
                                             ->with('usuario',$usuario)
                                             ->with('localidad',$localidad)
                                             ->with('departamento',$departamento)
                                             ->with('productos',$publicaciones)
                                             ->with('isadmin', 2);
        }

        return view("Empresa.VerEmpresa")->with('vendedor',$vendedor)
                                         ->with('usuario',$usuario)
                                         ->with('localidad',$localidad)
                                         ->with('departamento',$departamento)
                                         ->with('productos',$publicaciones)
                                         ->with('isadmin', $idUsu->isadmin);
    }

    public function VermiPerfil(){
        $idUsu = Auth::id();
        $publicaciones = Publicacion::select('publicacion.*')
                                    ->where('publicacion.usuario_id', '=' , $idUsu)
                                    ->orderBy('publicacion.titulo', 'ASC')
                                    ->get();
        /*$producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.usuario_id', '=' , $idUsu)
                                ->get();*/
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
                                         ->with('productos',$publicaciones)
                                         ->with('isadmin', $usuario->isadmin);
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
        $usuario = Auth::user();
        if(empty(Auth::user())){
            return view("Empresa.listarempresas")->with('empresas',$empresas)
            ->with('isadmin', 2);
        }
        return view("Empresa.listarempresas")->with('empresas',$empresas)
        ->with('isadmin', $usuario->isadmin);

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
        $usuario->isadmin = true;
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
        $vendedor->deshabilitado = 0;
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
        if($request->pass != null || $request->pass != ""){
            $usuario->password = Hash::make($request->pass);
        }
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->idDepartamento = $request->Departamento;
        if($request->localidad == "0"){
            $usuario->idLocalidad = $request->localidadhidden;
        }else{
            $usuario->idLocalidad = $request->localidad;
        }
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

    public function buscador($texto){
        $text = "%" . $texto . "%";
        $publicaciones = Publicacion::select('publicacion.*')
                                    ->where('publicacion.titulo', 'LIKE' , $text)
                                    ->orWhere('publicacion.descripcion', 'LIKE' , $text)
                                    ->orderBy('publicacion.titulo', 'ASC')
                                    ->get();
        /*$producto = Publicacion::select('publicacion.*','publicacion.id', 'producto.stock')
                                ->join('producto', 'publicacion.id', '=', 'producto.publicacion_id')
                                ->where('publicacion.titulo', 'LIKE' , $text)
                                ->orWhere('publicacion.descripcion', 'LIKE' , $text)
                                ->get();*/
        $empresas = Usuario::select('usuario.*','vendedor.*','departamento.nombre AS dnombre','localidad.nombre AS lnombre')
                                ->join('vendedor', 'usuario.id', '=', 'vendedor.id')
                                ->join('departamento', 'usuario.idDepartamento', '=', 'departamento.id')
                                ->join('localidad', 'usuario.idLocalidad', '=', 'localidad.id')
                                ->where('vendedor.nombrefantasia', 'LIKE' , $text)
                                ->orWhere('vendedor.descripcion', 'LIKE' , $text)
                                ->orderBy('vendedor.nombrefantasia', 'ASC')
                                ->get();

        $sizeproductos = $publicaciones->count();
        $sizeempresas = $empresas->count();
        $usuario = Auth::user();
        if(empty(Auth::user())){
        return view("Empresa.buscador")->with('empresas',$empresas)
                                       ->with('productos',$publicaciones)
                                       ->with('sizeproductos',$sizeproductos)
                                       ->with('sizeempresas',$sizeempresas)
                                       ->with('isadmin', 2);
        }
        return view("Empresa.buscador")->with('empresas',$empresas)
                                       ->with('productos',$publicaciones)
                                       ->with('sizeproductos',$sizeproductos)
                                       ->with('sizeempresas',$sizeempresas)
                                       ->with('isadmin', $usuario->isadmin);
    }

    public function desactivarcuenta(){
        $idUsu = Auth::id();
        $publicaciones = Publicacion::select('publicacion.*')
                                    ->where('publicacion.usuario_id', '=' , $idUsu)
                                    ->get();
        foreach ($publicaciones as $p) {
            $p->deshabilitado = 1;
            $p->save();
        }

        $vendedor = Vendedor::find($idUsu);
        $vendedor->deshabilitado = 1;

        $vendedor->save();

        Auth::logout();
        Session::flush();

        return redirect('/index');
    }

    public function verificarDatosEmpresa(Request $request){
        $email = $request->email;
        $cedula = $request->cedula;
        $rut = $request->rut;

        if($email != null && $email != ""){
            $usuario_email = Usuario::select('usuario.*')
            ->where('usuario.email', '=' , $email)
            ->get();
            if($usuario_email->count() > 0){
                return "El email ya esta en uso";
            }
        }
        if($cedula != null && $cedula != ""){
            $usuario_cedula = Usuario::select('usuario.*')
            ->where('usuario.cedula', '=' , $cedula)
            ->get();
            if($usuario_cedula->count() > 0){
                return "La cedula ya esta en uso";
            }
        }
        if($rut != null && $rut != ""){
            $usuario_rut = Vendedor::select('vendedor.*')
            ->where('vendedor.rut', '=' , $rut)
            ->get();
            if($usuario_rut->count() > 0){
                return "El rut ya esta en uso";
            }
        }
        return "OK";
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
