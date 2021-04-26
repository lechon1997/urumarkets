<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorWebServices extends Controller
{
    public function saludar(Request $request){
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
}
