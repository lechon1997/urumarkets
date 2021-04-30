<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Localidad;
class ControladorBD extends Controller
{


    public function altaUsu(Request $request){
        $usuario = DB::table('usuario')->insert(array(
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('pApellido'),
            'correo' => $request->input('correoE'),
            'contrasenia' => $request->input('passwd'),
            'tipoDoc' => 'cedula',
            'documento' => $request->input('documento'),
            'idDepartamento' => 1,
            'idLocalidad' => 1

        ));
        return redirect('/AltaEmpresa');
    }

    public function listarLocalidades(Request $request)
    {

        $idDepartamento = $request->input('id');

        $localidades = Localidad::where('idDepartamento',$idDepartamento)->get(['id','nombre']);
        return json_encode($localidades);
    }
}
