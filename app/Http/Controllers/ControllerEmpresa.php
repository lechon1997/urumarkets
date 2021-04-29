<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        public function AltaEmpresaBD(Request $request){
        $usuario = DB::table('usuario')->insert(array(
            'nombre' => $request->input('pnombre'),
            'apellido' => $request->input('papellido'),
            'correo' => $request->input('email'),
            'contrasenia' => $request->input('pass'),
            'tipoDoc' => 'RUT',
            'documento' => $request->input('Rut'),
            'idDepartamento' => $request->input('Departamento'),
            'idLocalidad' => $request->input('Localidad')
        ));

        $vendedor = DB::table('vendedor')->insert(array(
            'nombreTienda' => $request->input('nombretienda'),
            'tipoOrg' => $request->input('tipoOrg'),
            'rubro' => $request->input('rubro'),
            'telefono1' => $request->input('Telefono'),
            'telefono2' => $request->input('Telefono 2'),
            'celular1' => $request->input('Celular'),
            'celular2' => $request->input('Celular 2'),
            'segundoNombre' => $request->input('snombre'),
            'segundoApellido' => $request->input('sapellido'),
            'localidad' => $request->input('Localidad'),
            'calle1' => $request->input('Calle'),
            'numeroLocal' => $request->input('NumeroEmpresa'),
            'descripcion' => $request->input('Descripcion')
        ));
        return redirect('/altaUsu');
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
