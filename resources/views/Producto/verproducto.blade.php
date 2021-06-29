<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>UruMarkets {{$datos->titulo}}</title>
</head>

<body>

    @include('layouts.headerVisitante')

    <div class="bg-white w-75 container d-flex flex-wrap mt-3 rounded border p-0" style="min-height: 500px;">
        <div>
        </div>
        <div class="p-2" style="width:40%;">
            <div class="imagenxd">
                <img  src="http://localhost/urumarkets/public/storage/productos/{{$datos->foto}}" class="img-fluid">
            </div>
        </div>
        <div class="" style="width:60%;">
            <div class="d-flex container border-left h-100 pt-3 pl-3 pr-3" style="flex-direction:column;">
                <div>
                    <p id="tit" class="h4">{{$datos->titulo}}</p>
                    <a class="d-block mt-1 mb-2" href="http://localhost/urumarkets/public/VerEmpresa/{{ $empresa->id }}">Visitar la tienda de {{$empresa->nombreFantasia}}</a>

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
                        @if($tipoPub == "Producto")
                        <input id="cantProd" class="w-25 ml-3 form-control" onkeypress="return event.charCode >= 48" type="number" min="1" value="1">
                        @else
                        <input id="cantProd" class="w-25 ml-3 form-control" disabled="true" onkeypress="return event.charCode >= 48" type="number" min="1" value="1">
                        @endif
                    </div>
                </div>
            </div>
        </div>        
    </div>  
    <br>


    <div id="pub"><p id="ppub">Mas publicaciones de {{$empresa->nombreFantasia}}</p></div>

    <div class="album ">
        <div class="container">
          <div id="myConteiner" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productos as $prod)
            @if($prod->deshabilitado == 0)
            <div style="margin-bottom: 3%;" class="col">
              <div class="card shadow-sm caca">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $prod->descripcion }}</title><rect width="100%" height="100%" fill="#FAFAFA"></rect>
                  @if ($prod->foto != "")
                  <image href="http://localhost/urumarkets/public/storage/productos/{{ $prod->foto }}" height="100%" width="100%"/></svg>
                      @else
                      <image href="http://localhost/urumarkets/imagenes/producto-defecto.jpg" height="100%" width="100%"/></svg>
                      @endif

                      <div class="card-body borde">
                        <p class="card-text">{{ $prod->titulo}} - {{ $prod->tipoMoneda}}{{ $prod->precio}}</p>    
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" onclick="location.href='http://localhost/urumarkets/public/producto/{{ $prod->id }}'" value="{{ $prod->id }}" class="btn btn-sm btn-outline-secondary">VER</button>
                            @if( $prod->oferta == 1 )
                            <div class="btn btn-sm btn-danger">EN OFERTA {{ $prod->porcentajeOferta }}%</div>
                            @endif

                        </div>
                        <button data-toggle="modal" data-target="#exampleModal" type="button" value="{{ $prod->id }}" class="carrito btn btn-sm btn-outline-success"> Agregar al carrito <i class="bi-cart-fill me-1"></i></button>
                        <!-- <small class="text-muted">9 mins</small> -->
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>       
</div>

<!-- Modal -->
<div class="modal fade modal-auto-clear" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p class="h5">El producto se agregó a su carrito.</p>
      </div>
  </div>
</div>
</div>

<script>
  $('#myAlert').on('closed.bs.alert', function () {
  		// do something…
      })
  </script>

</div>

</div>
<!-- Button trigger modal pija -->
<!-- Modal -->
<div class="modal fade modal-auto-clear" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$empresa->nombreFantasia}}</h5>
            </div>
            <div class="modal-body">
                <p class="h5">El producto se agregó a su carrito.</p>
            </div>

        </div>
    </div>
</div>
<style type="text/css">
    .borde{ 
        border-top: 1px solid #777;
        margin-top: 2%;
    }   
    .caca:hover {
        border: 1px solid #777;
    }
    #pub{
        background: white;
        width: 100%;
        display: inline-block;
        padding: .5%;
        font-size: x-large;
        font-family: inherit;
        margin-bottom: 2%;
    }       
    #ppub{
        margin-top: 0;
        margin-bottom: 0;
        margin-left: 20%;
    }
    .imagenxd{
        padding-right:0px;
        padding-left: 0px;
        border: 1px solid #D9D7D7; 
        display:flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>

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
<script type="text/javascript">
          /*$('#carouselExampleCaptions').on('click', function () {
            $('.carousel').carousel('pause');
        })*/         

        $('.carrito').on('click', function() {
            let _id = $(this).val();      
            $.ajax({
              url: "http://localhost/urumarkets/public/aumentar",
              dataType: "json",
              data: {
                id: _id,
                cantidad: 1
            },
            method: "GET",
            success: function(res) {
                let variable = $('#spanCarrito').text();
                let variableInt = parseInt(variable);
                variableInt+=1;
                $('#spanCarrito').html(variableInt);                     
            }
        });
        });

        $('.modal-auto-clear').on('shown.bs.modal', function() {
            $(this).delay(500).fadeOut(200, function() {
              $(this).modal('hide');
          });
        });

        $('.modal-auto-clear').on('shown.bs.modal', function() {
            $(this).delay(900).fadeOut(200, function() {
              $(this).modal('hide');
          });
        })

    </script>
    </html>