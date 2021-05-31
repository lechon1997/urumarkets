<?php


namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Localidad;
use App\Models\Publicacion;
use App\Models\Vendedor;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ControladorWebServices extends Controller
{
    public function saludar(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $resultado = "Hola $nombre $apellido,Saludos.";

        return json_encode(array(
            'status' => 200,
            'response' => array(
                'mensaje' => $resultado
            )
        ));
    }

    public function altaUsuws(Request $request)
    {

        $bd = new ControladorBD();
        $bd->altaUsu($request);
        return true;
    }

    public function altaEmpws(Request $request)
    {

        $CE = new ControllerEmpresa();
        $CE->altaVendedor($request);
        $myArr = array("estado" => "ok");
        return json_encode($myArr);
    }

    public function getLocalidades(Request $request)
    {
        $bd = new ControladorBD();
        $localidades =  json_decode($bd->listarLocalidades($request));
        return json_encode(["localidades" => $localidades]);
    }

    public function autenticarUsuario(Request $request)
    {

        $credenciales = request()->only('email', 'password');
        if (Auth::attempt($credenciales)) {

            $usuario = Auth::user();
            $usu = Vendedor::find(Auth::id());
            $tipoUsuario = "";
            if(empty($usu)){
                $tipoUsuario = "cliente";
            }else{
                $tipoUsuario = "vendedor";
            
            }
            $departamento = Departamento::find($usuario->idDepartamento);
            $localidad = Localidad::find($usuario->idLocalidad);
            $myArr = array("estado" => "ok",
                            "id" => $usuario->id,
                            "tipoUsu" => $tipoUsuario,
                            "pnombre" => $usuario->primerNombre,
                            "snombre" => $usuario->segundoNombre,
                            "papellido" => $usuario->primerApellido,
                            "sapellido" => $usuario->segundoApellido,
                            "cedula" => $usuario->cedula,
                            "telefono" => $usuario->telefono,
                            "email" => $usuario->email,
                            "idDepartamento" => $usuario->idDepartamento,
                            "nomDepartamento" => $departamento->nombre,
                            "idLocalidad" => $usuario->idLocalidad,
                            "nomLocalidad" => $localidad->nombre,
                            "pnombre" => $usuario->primerNombre);
            return json_encode(["respuesta" => $myArr]);
        }
        $myArr2 = array("estado" => "incorrecto");
        return json_encode(["respuesta" => $myArr2]);
    }

    public function actualizarUsu(Request $request){
        $BD = new ControladorBD();
        $BD->actualizarDatosUsuario($request);
        $usuario = Usuario::find($request->id);
        $usu = Vendedor::find($request->id);
            $tipoUsuario = "";
            if(empty($usu)){
                $tipoUsuario = "cliente";
            }else{
                $tipoUsuario = "vendedor";
            
            }

        $departamento = Departamento::find($usuario->idDepartamento);
        $localidad = Localidad::find($usuario->idLocalidad);
        $myArr = array("estado" => "ok",
                        "id" => $usuario->id,
                        "tipoUsu" => $tipoUsuario,
                        "pnombre" => $usuario->primerNombre,
                        "snombre" => $usuario->segundoNombre,
                        "papellido" => $usuario->primerApellido,
                        "sapellido" => $usuario->segundoApellido,
                        "cedula" => $usuario->cedula,
                        "telefono" => $usuario->telefono,
                        "email" => $usuario->email,
                        "idDepartamento" => $usuario->idDepartamento,
                        "nomDepartamento" => $departamento->nombre,
                        "idLocalidad" => $usuario->idLocalidad,
                        "nomLocalidad" => $localidad->nombre,
                        "pnombre" => $usuario->primerNombre);
        return json_encode(["respuesta" => $myArr]);
    }
    public function altaproductowbs(Request $request){
        $ContP = new ControllerPublicacion();
        $ContP->altaProd($request);
        $myArr = array("estado" => "ok");
        return json_encode($myArr);
    }

    public function listarProductos(){
        $publicaciones = Publicacion::select('publicacion.*')->get();
        return json_encode(["respuesta" =>$publicaciones]);
    }
}
