<?php
namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Historial;
use App\Models\Vendedor;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Use Redirect;
use MercadoPago; 
use DateTime;

class ControllerCarrito extends Controller{
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
        $idVendedor = $pub->usuario_id;
        $titulo = $pub->titulo;
        $pre = $pub->precio;
        $dsc = $pub->porcentajeOferta;
        $descontar =  ($pre * $dsc)/100;
        $precio = round($pre - $descontar);
        $existe = false;
        $lista = Session::get('cart');
        $total = 0;
        
        if(Session::exists('cart')){
            foreach($lista as $producto){            
                if($producto[0] == $id){
                    if(Producto::find($id)){
                        $producto[1] += $cant;
                        $total = $producto[1] * $precio;
                        $producto[4] = $total;
                    }else{
                        return "servicio";
                    }
                    $existe = true;
                }
            } 
        }
        
        if($existe == false){
            $total = $precio * $cant;
            $product = collect([$id , $cant, $precio,$titulo,$total, $idVendedor]);
            Session::push('cart', $product);
        }

        return $cant;
                
     }

    public function poronga(Request $request){
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
            foreach($lista as $producto){           
                if($producto[0] == $id){
                    $producto[1] = $cant;
                    $total = $producto[1] * $precio;
                    $producto[4] = $total;
                    $existe = true;
                }
            } 
        
        }
        
        if($existe == false){
            $total = $precio * $cant;
            $product = collect([$id , $cant, $precio,$titulo,$total]);
            Session::push('cart', $product);
        }
        
        return $total;
    }


    public function borrarProductoCarrito(Request $request){
        $id = $request->input('id');        
        $pub = Publicacion::find($id);
        $lista = Session::get('cart');
        $shrek = 0;
        $cantidad = 0;

        if(Session::exists('cart')){           
            foreach($lista as $producto){
                if($producto[0] == $id){                
                    unset($lista[$shrek]); 
                    $lista = array_values($lista);
                    Session::put('cart', $lista);                     
                }
                $shrek++;
            }
        }

        return response()->json([
            'redirect' => url('http://localhost/urumarkets/public/Carrito'),          
        ]);
    }

    public function apiMP(Request $request){
        $total = 0;
        if(Session::exists('cart')){
            $lista = Session::get('cart');
            foreach($lista as $producto){
                $total = $total + $producto[4];
            }
                                  
        }            
        return view("Producto.mercadoPago")->with("total", $total)
                                           ->with('isadmin', Auth::user()->isadmin);
     }

    public function finalizarCompra(Request $request){   
        MercadoPago\SDK::setAccessToken("TEST-5577742987867958-060722-7495a84e342d0c7f24c2e30b0e9687a1-771972444");

        $payment = new MercadoPago\Payment();

        $payment->transaction_amount = (float) $request->transaction_amount;
        $payment->token = $request->token;
        $payment->description = $request->description;
        $payment->installments = (int) $request->installments;
        $payment->payment_method_id = $request->payment_method_id;
        $payment->issuer_id = (int) $request->issuer_id;      

        $payer = new MercadoPago\Payer();
        $payer->email = $request->payer['email'];
        $payer->identification = array(
            "type" => $request->payer['identification']['type'],
            "number" => $request->payer['identification']['number']
        );
        
        $payment->payer = $payer;        
        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );    
 
        echo json_encode($response);   
        
        if($response['status'] == "approved"){
            /*  1 - Hacer una consulta a la BD para traer el último numero del
                   grupo que fue insertado.
                2 - A ese número sumarle 1 y agregarlo al historial.
            */ 
            $ultimoHistorial =  Historial::select('historial.*')->latest('grupo')->first();
                
            $idUsu = Auth::id();          
            if(Session::exists('cart')){
                $lista = Session::get('cart');
                foreach($lista as $producto){
                    $historial = new Historial();
                    $historial->publicacion_id = $producto[0];
                    $historial->cliente_id = $idUsu;
                    $historial->vendedor_id = $producto[5];
                    $historial->cantidad = $producto[1];
                    $historial->fecha = new DateTime();
                    $historial->save();                    
            }
            Session::forget('cart');
        }           
                
        }
    }

    public function mostrarHistorialV(){
        $datos = array();

        $vendedor = Auth::user();

        $datosHistorial = Historial::select('publicacion.*', 'historial.cantidad', 'historial.fecha')
                                    ->join('vendedor', 'vendedor.id', '=', 'historial.vendedor_id')
                                    ->join('publicacion', 'publicacion.id', '=', 'historial.publicacion_id')
                                    ->where('historial.vendedor_id', $vendedor->id)
                                    ->orWhere('historial.vendedor_id', '=', 'vendedor.id')
                                    ->get();
                                                                                        

        return view("Producto.historial")->with('datos', $datosHistorial)
                                         ->with('isadmin', Auth::user()->isadmin);


    }

    public function mostrarHistorialC(){
        $datos = array();

        $cliente = Auth::user();

        $datosHistorial = Historial::select('publicacion.*', 'historial.cantidad', 'historial.fecha')
                                    ->join('cliente', 'cliente.id', '=', 'historial.cliente_id')
                                    ->join('publicacion', 'publicacion.id', '=', 'historial.publicacion_id')
                                    ->where('historial.cliente_id', $cliente->id)
                                    ->orWhere('historial.cliente_id', '=', 'cliente.id')
                                    ->get();
                                                                                        

        return view("Usuario.compras")->with('datos', $datosHistorial)
                                         ->with('isadmin', Auth::user()->isadmin);


    }

    public function traerCantidad(){
        $cantidad = 0;
        if(Session::exists('cart')){
            $lista = Session::get('cart');
            foreach($lista as $producto){
                    $cantidad = $cantidad + $producto[1];
            }
        }

        return $cantidad;
    }

}
