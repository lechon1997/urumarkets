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
    <form id="form-checkout" method="POST" action="completarCompra">
    @csrf
    <div class="container mt-5 pt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>                  
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$dato['titulo']}}</td>
                    <td>{{$dato['precio']}}</td>                    
                    <td style="width: 15%"><div id="divrancio" style="width: 70px"><input id="cantProd{{$dato['id']}}" class="form-control" type="number" disabled="" min="0" onchange = "cambioCantidad(this)" 
                    data-value = "{{$dato['id']}}" value="{{$dato['cantidad']}}"></div></td>                     
                    <td id = "total{{$dato['id']}}" >{{$dato['precio'] * $dato['cantidad'] - 
                    $dato['precio'] * $dato['cantidad'] * $dato['porcentajeOferta'] / 100 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>                
        </form>
    </div>

</body>

</html>