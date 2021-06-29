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

    <div class="bg-white w-75 container d-flex flex-wrap mt-3 rounded border p-0" style="min-height: 500px;">
        <div>
        </div>
        <div class="p-2" style="width:40%;">
            <div class="w-100">
                <img src="http://localhost/urumarkets/public/storage/productos/{{$datos->foto}}" width="100%" 
                style="object-fit: contain; border-radius: 5px;">
            </div>

        </div>
        <div class="" style="width:60%;">
            <div class="d-flex container border-left h-100 pt-3 pl-3 pr-3" style="flex-direction:column;">
                <div>
                    <p id="tit" class="h4">{{$datos->titulo}}</p>
                    <a class="d-block mt-1 mb-2" href="#">Visitar la tienda de {{$datos->nombreFantasia}}</a>

                    @if($datos->porcentajeOferta == 0)
                    <p id="buenPrecioxd" class="d-block mt-3 h4" style="color: #343a40;" value="{{$datos->precio}}" >Precio: ${{$datos->precio}}</p>
                    @else
                    <div class="d-flex">
                        <p class="d-block mr-2 mt-3 h4" style="color:#343a40;">Precio:</p>
                        <div>
                            <div class="d-flex">
                                <p id="buenPrecioxd" class="d-block  mt-3 h4" style="color:#00C853;" value="{{$datos->precio}}">${{$datos->precioConDesc}}</p>
                                <p  class="d-block ml-1 mt-3 h4" style="color:#00C853;font-size: 14px;">{{$datos->porcentajeOferta}}%OFF</p>

                            </div>
                            <p class="d-block ml-2 h4" style=" color:#D50000; font-size: 14px;">Antes ${{$datos->precio}}</p>
                        </div>
                    </div>
                    @endif
                    <p class="d-block mt-3 h4" style="color: #343a40;">Stock: {{$datos->stock}} unidades</p>
                </div>

                <div style="display:flex; flex-direction:column;flex:1;">
                    <p class="h3 d-flex justify-content-center" style=" color: #343a40; height:auto;">Descripción</p>
                    <div class="w-100  p-2">
                        <p>{{$datos->descripcion}}.</p>


                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button  data-toggle="modal" data-target="#exampleModal" type="button" id="myModal" value="{{$datos->id }}" class="m-3 w-50 btn btn-success">Agregar al carrito </button>
                    <div class="w-50 pl-2 d-flex align-items-center">
                        <p class="h5 mt-2">Cantidad</p>
                        <input id="cantProd" class="w-25 ml-3 form-control" onkeypress="return event.charCode >= 48" type="number" min="1" value="1">
                    </div>
                </div>
            </div>
        </div>        
    </div>  
    <script>
		$('#myAlert').on('closed.bs.alert', function () {
  		// do something…
		})
	</script>
</body>



        </div>

    </div>
    <!-- Button trigger modal pija -->
    <!-- Modal -->
    <div class="modal fade modal-auto-clear" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$datos->nombreFantasia}}</h5>
                </div>
                <div class="modal-body">
                    <p class="h5">El producto se agregó a su carrito.</p>
                </div>

            </div>
        </div>
    </div>

</body>

<script>
    $('.modal-auto-clear').on('shown.bs.modal', function() {
        $(this).delay(900).fadeOut(200, function() {
            $(this).modal('hide');
        });
    })
    //onclick="location.href='http://192.168.1.11/urumarkets/public/aumentar'"
    $('#myModal').on('click', function() {
        let _id = $('#myModal').val();
        let _cantidad = $('#cantProd').val();
        let _titulo = $('#tit').text();
        $.ajax({
                url: "http://localhost/urumarkets/public/aumentar",
                dataType: "json",
                data: {
                    id: _id,
                    cantidad: _cantidad,
                    titulo: _titulo
                },
                method: "GET",
                success: function(res) {
           
                }
            });
        

    });
</script>

</html>