<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Localidad;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControladorBD extends Controller
{


    public function altaUsu(Request $request)
    {

        $nom = $request->input('nombre');
        $nom2 = $request->input('nombre2');
        if (empty($nom2))
            $nom2 = "";
        $ape = $request->input('pApellido');
        $ape2 = $request->input('apellido2');
        if (empty($ape2))
            $ape2 = "";
        $doc = $request->input('documento');
        $telefono = $request->input('telefono');
        $correo = $request->input('correoE');
        $pass = $request->input('passwd');
        $pass2 = $request->input('passwd2');
        $idD = $request->input('departamento');
        $idL = $request->input('localidad');

        if (empty($nom) || empty($ape) || empty($correo) || empty($pass) || empty($idD) || empty($idL) || empty($doc)) {
            return response()->view('errors.' . '500', [], 500);
        }


        $usua = new Usuario();
        $usua->primerNombre = $nom;
        $usua->segundoNombre = $nom2;
        $usua->primerApellido = $ape;
        $usua->segundoApellido = $ape2;
       // $usua->contrasenia =  $pass;
        $usua->contrasenia = Hash::make($pass);
        $usua->cedula = $doc;
        $usua->email = $correo;
        $usua->telefono = $telefono;
        $usua->idDepartamento = $idD;
        $usua->idLocalidad = $idL;
        $usua->save();

        $cli = new Cliente();
        $usua->clientes()->save($cli);

        return redirect('/AltaEmpresa');
    }

    public static function altaUsuarioWs(Request $request)
    {
        // $this->altaUsu($request);
    }

    private function departamentoValido($id)
    {
        $depa = Departamento::where('id', $id)->get();
        if ($depa === null)
            return false;
        return true;
    }

    public function listarLocalidades(Request $request)
    {

        $idDepartamento = $request->input('id');

        $localidades = Localidad::where('idDepartamento', $idDepartamento)->get(['id', 'nombre']);
        return json_encode($localidades);
    }


    public function actualizarDatosUsuario(Request $request)
    {

        //reemplazar con la variable globar session

        $nom = $request->input('nombre');
        $nom2 = $request->input('nombre2');
        if (empty($nom2))
            $nom2 = "";
        $ape = $request->input('pApellido');
        $ape2 = $request->input('apellido2');

        if (empty($ape2))
            $ape2 = "";

        $doc = $request->input('documento');
        $telefono = $request->input('telefono');
        $correo = $request->input('correoE');
        $idD = $request->input('departamento');
        $idL = $request->input('localidad');

        $idUsu = 1;
        $usua = Usuario::find($idUsu);

        $usua->primerNombre = $nom;
        $usua->segundoNombre = $nom2;
        $usua->primerApellido = $ape;
        $usua->segundoApellido = $ape2;
        $usua->cedula = $doc;
        $usua->email = $correo;
        $usua->telefono = $telefono;
        $usua->idDepartamento = $idD;
        $usua->idLocalidad = $idL;
        $usua->save();

        return redirect('/AltaEmpresa');
    }
}
