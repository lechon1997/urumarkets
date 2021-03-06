<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Departamento;
use App\Models\Localidad;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Session;

class controllerUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::select('publicacion.*')
        ->orderBy('publicacion.titulo', 'ASC')
        ->get();
        $empresas = Usuario::select('usuario.*','vendedor.*','departamento.nombre AS dnombre','localidad.nombre AS lnombre')
        ->join('vendedor', 'usuario.id', '=', 'vendedor.id')
        ->join('departamento', 'usuario.idDepartamento', '=', 'departamento.id')
        ->join('localidad', 'usuario.idLocalidad', '=', 'localidad.id')
        ->get();
        $usuario = Auth::user();

        if(isset($usuario)){
           return view("index")->with('productos',$publicaciones)
           ->with('empresas',$empresas)
           ->with('isadmin', $usuario->isadmin);   
       }

       return view("index")->with('productos',$publicaciones)
       ->with('empresas',$empresas);
       
   }

    public function loginUser()
    {
        return view("login2");
    }


    public function altaUsuario()
    {
        return view("Usuario.altaUsuario");
    }

    public function actualizarDatosUsuario()
    {
        $usuario = Auth::user();
        $depaUsu = Auth::user()->idDepartamento;
        $idLocalidad = Auth::user()->idLocalidad;

        $localidadusu = Localidad::select('id', 'nombre')
            ->where('id', '=', $idLocalidad)
            ->first();

        $departamentoUsu = Departamento::select('id', 'nombre')
            ->where('departamento.id', '=', $depaUsu)
            ->first();

        $localidades = Localidad::select('id', 'nombre')
            ->where('idDepartamento', '=', $depaUsu)
            ->where('id', '!=', $idLocalidad)
            ->get();

        $departamentos = Departamento::select('id', 'nombre')
            ->where('departamento.id', '!=', $depaUsu)
            ->get();

        return view("Usuario.modificarUsuario")->with('usuario', $usuario)
            ->with('localidades', $localidades)
            ->with('departamentos', $departamentos)
            ->with('departamentoUsu', $departamentoUsu)
            ->with('localidadUsu', $localidadusu)
            ->with('isadmin',$usuario->isadmin);
    }

    public function cerrarSession(Request $request)
    {

        Auth::logout();

        $request->session()->regenerateToken();
        Session::flush();
        return redirect('/loginUsuario');
    }

        public function verificarDatosUsuario(Request $request){
        $email = $request->email;
        $cedula = $request->cedula;

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
        return "OK";
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
    }

    public function registrarse()
    {
        return view("Usuario.registrarse");
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
