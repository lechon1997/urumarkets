<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Ver producto humilde </title>
</head>

<body>
    @include('layouts.headerVisitante')
    <div class="bg-white w-75 container d-flex mt-3 rounded border p-0" style="height:500px ;">
        <div class="p-2" style="width:40%;height:60%;">
            <div class="w-100">
                <img src="http://localhost/urumarkets/public/storage/productos/{{$datos->foto}}" width="100%" style="object-fit: contain;border-radius: 5px;">
            </div>

        </div>
        <div class="" style="width:60%;height:100%;">
            <div class="container border-left h-100 p-3">
                <div style="height: 40%;">
                    <p class="h4">{{$datos->titulo}}.</p>
                    <a class="d-block mt-1 mb-2" href="#">Visitar la tienda de {{$datos->nombreFantasia}}</a>

                    @if($datos->porcentajeOferta == 0)
                    <p class="d-block mt-3 h4" style="color: #343a40;">Precio: ${{$datos->precio}}</p>
                    @else
                    <div class="d-flex">
                        <p class="d-block mr-2 mt-3 h4" style="color:#343a40;">Precio:</p>
                        <div>
                            <div class="d-flex">
                                <p class="d-block  mt-3 h4" style="color:#00C853;">${{$datos->precioConDesc}}</p>
                                <p class="d-block ml-1 mt-3 h4" style="color:#00C853;font-size: 14px;">{{$datos->porcentajeOferta}}%OFF</p>

                            </div>
                            <p class="d-block ml-2 h4" style=" color:#D50000; font-size: 14px;">Antes  ${{$datos->precio}}</p>
                        </div>
                    </div>
                    @endif
                    <p class="d-block mt-3 h4" style="color: #343a40;">Stock: {{$datos->stock}} unidades</p>
                </div>

                <div class="" style="height: 45%;">
                    <p class="h3 d-flex justify-content-center" style="color: #343a40; height:auto;">Descripción</p>
                    <div class="w-100 h-75 p-2">
                        <p>{{$datos->descripcion}}.</p>

                    </div>
                </div>
                <div class="d-flex align-items-center" style="height: 15%;">
                    <button type="button" value="{{$datos->id }}" class="m-3 w-50 btn btn-success">Agregar al carrito </button>
                    <div class="w-50 pl-2 d-flex align-items-center">
                        <p class="h5 mt-2">Cantidad</p>
                        <input class="w-25 ml-3 form-control" type="number" min="0" value="1">
                    </div>
                </div>


            </div>



        </div>
    </div>
</body>

</html>