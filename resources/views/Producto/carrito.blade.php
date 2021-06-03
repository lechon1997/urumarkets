<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Carrito</title>
</head>

<body>
    @include('layouts.headerVisitante')
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
                    <!--{{$dato['id']}} este iría en el value del boton quitar producto,maldito garca uwu, grax bb uwu >.< -->
                    <td>{{$dato['titulo']}}</td>
                    <td>{{$dato['precio']}}</td>                    
                    <td style="width: 15%"><div id="divrancio" style="width: 70px"><input id="cantProd{{$dato['id']}}" class="form-control" type="number" min="0" onchange = "cambioCantidad(this)" 
                    data-value = "{{$dato['id']}}" value="{{$dato['cantidad']}}"></div></td>                     
                    <td id = "total{{$dato['id']}}" >{{$dato['total']}}</td>
                    <td>
                        <button type="button" class="btn btn-light actualizar">Actualizar</i></button>
                        <button id = "{{$dato['id']}}" type="button" value = "{{$dato['id']}}" 
                                onclick = "eliminarProducto(this)" class="btn btn-light borrar">
                                <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                    
                }
            }); 
        }        

    </script>

</body>

</html>