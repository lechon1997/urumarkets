<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Departamento;
use App\Models\Localidad;

class controllerUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index");
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
        $idusu = Auth::id();
        $usuario = Usuario::find($idusu);
        $depaUsu = Auth::user()->idDepartamento;
        $idLocalidad = Auth::user()->idLocalidad;
        
        $departamentos = Departamento::select('id','nombre')
                            ->where('departamento.id','!=',$depaUsu)
                            ->get();

        $localidades = Localidad::select('id','nombre')
                            ->where('idDepartamento','=',$depaUsu)
                            ->where('id','!=',$idLocalidad)
                            ->get();

        return view("Usuario.modificarUsuario")->with('usuario',$usuario)
                                               ->with('localidades',$localidades)
                                               ->with('departamentos',$departamentos);
                                               
        
    }

    public function cerrarSession(Request $request)
    {

        Auth::logout();

        $request->session()->regenerateToken();

        return redirect('/loginUsuario');
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
