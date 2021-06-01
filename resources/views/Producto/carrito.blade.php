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
                    <!--{{$dato['id']}} este iría en el value del boton quitar producto,maldito garca uwu -->
                    <td>{{$dato['titulo']}}</td>
                    <td>{{$dato['precio']}}</td>
                    <td>{{$dato['cantidad']}}</td>
                    <td>{{$dato['total']}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>



</body>

</html>