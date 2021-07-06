<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Historial de ventas</title>
</head>

<body>
    @include('layouts.headerVisitante')
    <div id="accordion">
    @php
    if($existendatos == "sip"){
        $g = $datos[0]->grupo;    
        $primeravez = "si";   
    }
    @endphp
    @if($existendatos == "sip")
    @foreach ($datos as $dato)
        @php
        if($existendatos == "sip"){
            if($g != $dato->grupo){
                $primeravez = "si";
                $g = $dato->grupo;
            }
        }
        @endphp
        @if($primeravez =="si")
        @php
        $primeravez = "no";
        @endphp
            <div class="card" style="background-color: #ECE8E8;">
                <div class="card-header" id="heading{{$dato->grupo}}" >
                    <h5 class="mb-0">
                        <button class="btn"  data-toggle="collapse" data-target="#collapse{{$dato->grupo}}" aria-expanded="true" aria-controls="collapse{{$dato->grupo}}">
                          Compra del {{$dato->fecha}}
                        </button>
                    </h5>
                </div>
            <div id="collapse{{$dato->grupo}}" class="collapse" aria-labelledby="heading{{$dato->grupo}}" 
                data-parent="#accordion">
                <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $dato)
                                 @if($g == $dato->grupo)
                                <tr>
                                    <td>{{$dato['titulo']}}</td>
                                    <td>{{$dato['precio']}}</td>                    
                                    <td style="width: 15%"><div id="divrancio" style="width: 70px"><input id="cantProd{{$dato['id']}}" class="form-control" type="number" disabled="" min="0" onchange = "cambioCantidad(this)" 
                                    data-value = "{{$dato['id']}}" value="{{$dato['cantidad']}}"></div></td>                     
                                    <td id = "total{{$dato['id']}}" >{{$dato['precio'] * $dato['cantidad'] - 
                                    $dato['precio'] * $dato['cantidad'] * $dato['porcentajeOferta'] / 100 }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>                                       
                </div>
            </div>
            </div>
            @endif
    @endforeach
    @endif
    </div>

</body>

</html>