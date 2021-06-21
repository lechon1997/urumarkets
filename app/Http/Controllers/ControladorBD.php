<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Localidad;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControladorBD extends Controller
{


    public function altaUsu(Request $request)
    {

        try {
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
            $usua->password = Hash::make($pass);
            $usua->cedula = $doc;
            $usua->email = $correo;
            $usua->telefono = $telefono;
            $usua->idDepartamento = intval($idD);
            $usua->idLocalidad = intval($idL);
            $usua->isadmin = false;
            $usua->save();
            $cli = new Cliente();
            $usua->clientes()->save($cli);
        
        } catch (Exception $e) {
            return  $e->getMessage();
        }


        return redirect('/loginUsuario');
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

        $idDepartamento = intval($request->input('id'));

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

        $idUsu = Auth::id();
        if(empty($idUsu)){
            global $idUsu;
            $idUsu = $request->input('id');
        }

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

    public function autenticarUsuario(Request $request)
    {
        $credenciales = request()->only('email', 'password');
        if (Auth::attempt($credenciales)) {

            request()->session()->regenerate();
            return redirect('/index');
        }
        
        return redirect('/loginUsuario');
    }

    public function listarcompras(){
        return view("Usuario.compras");
    }
}
