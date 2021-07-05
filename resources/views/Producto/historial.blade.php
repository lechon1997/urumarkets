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
        $g = $datos[0]->grupo;       
    @endphp
  
    @foreach ($datos as $dato)
        @if($g == $dato->grupo)
            <div class="card">
                <div class="card-header" id="heading{{$dato->grupo}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$dato->grupo}}" aria-expanded="true" aria-controls="collapse{{$dato->grupo}}">
                          Compra {{$dato->grupo}} - {{$dato->fecha}}
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
        @else
        @php
            $g = $dato->grupo
            @endphp
        @endif
    @endforeach
    </div>
    <style type="text/css">
        .borrar:hover{
            background-color: #c9302c;
            border-color: #ac2925;
        }

        .actualizar:hover{
            background-color: #6ED320; 
        }

    </style>

    <script>

        function cambioCantidad(input){                  
            let _id = input.dataset.value;
            let _cantidad = $(input).val();
            $.ajax({
                url: "http://localhost/urumarkets/public/pijazo",
                dataType: "json",
                data: {
                    id: _id,
                    cantidad: _cantidad
                },
                method: "GET",
                success: function(res) {
                    var total = res;
                    $("#total"+_id).text(total);                    
                }
            }); 
        }

        function eliminarProducto(boton){
            var _id = boton.id;
            $.ajax({
                url: "http://localhost/urumarkets/public/borrarTodo",
                dataType: "json",
                data: {
                    id: _id
                },
                method: "GET",
                success: function(res) {
                     window.location = res.redirect;
                }
            }); 
        }        

    </script>

</body>

</html>
