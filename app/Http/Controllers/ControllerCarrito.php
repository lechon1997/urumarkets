<?php
namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class ControllerCarrito extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function incrementar(Request $request){
        $id = $request->input('id');
        $cant = intval($request->input('cantidad'));
        
        $pub = Publicacion::find($request->id);
        $titulo = $pub->titulo;
        $pre = $pub->precio;
        $dsc = $pub->porcentajeOferta;
        $descontar =  ($pre * $dsc)/100;
        $precio = round($pre - $descontar);
        $existe = false;
        $lista = Session::get('cart');
        $total = 0;
        
        if(Session::exists('cart')){
            foreach($lista as $producto)
            
            if($producto[0] == $id){
                $producto[1] += $cant;
                $total = $producto[1] * $precio;
                $producto[4] = $total;
                $existe = true;
            } 
        
        }
        
        if($existe == false){
            $total = $precio * $cant;
            $product = collect([$id , $cant, $precio,$titulo,$total]);
            Session::push('cart', $product);
        }
        
        
     }

}
