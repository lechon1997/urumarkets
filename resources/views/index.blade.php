
<!DOCTYPE html>
<html>
<head>
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>URUMARKET Inicio</title>
</head>
<body>
  @include('layouts.headerVisitante')

  <div id="carouselExampleCaptions" class="carousel slide tujavie" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3" class=""></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block centradito" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="http://localhost/urumarkets/imagenes/propaganda1.JPG" data-holder-rendered="true">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="btn btn-primary" style="color: white;">Electrodomesticos hasata un 40% OFF</h5>
          <br>
          <p class="btn btn-dark" style="color: white;">No te pierdas las mejores ofertas en electrodomesticos</p>
        </div>
      </div>
      <div class="carousel-item ">
        <img class="d-block centradito" src="http://localhost/urumarkets/imagenes/propagandaelectrodomesticos4.JPG" data-holder-rendered="true">
        <div class="carousel-caption d-none d-md-block" >
          <h5 class="btn btn-primary btnprop" id="elect">Electrodomesticos</h5>
          <br>
          <div style="display: inline-flex;width: auto;margin-left: auto;margin-right: auto;">
            @php
            $contador = 0
            @endphp
            @foreach ($empresas as $empresa)
            @if ($empresa->rubro == "Electrodomésticos" && $contador < 2)
            @php
            $contador++
            @endphp
            <div class="container posicion" style="color: black;text-align: left;">
              <div class="card mb-3 xd" style="max-width: 540px;">
                <div class="row g-0" style="margin-right: 0px;margin-left: 0px;">
                  <div class="col-md-4 imagenxd">

                    <img
                    align="middle"
                    src="storage/empresa/{{ $empresa->imagen }} "
                    alt="..."
                    style="height:auto;object-fit: fill;"
                    class="img-fluid"
                    />

                  </div>
                  <div class="col-md-8" style="padding-left: 0px;padding-right: 0px; border: 1px solid #D9D7D7; float: left;" >
                    <h4 style=" border-bottom: 1px solid #D9D7D7;">{{ $empresa->nombreFantasia }}</h4>
                    <small style="margin-left: 2%;"><cite title="{{ $empresa->dnombre}}, {{ $empresa->lnombre}}">{{ $empresa->direccion }} <i class="fa fa-map-marker"></i></cite></small>
                    <p>
                      <i class="fa fa-envelope" style="margin-left: 5%;"></i> {{ $empresa->email }} 
                      <br />
                      <i class="fa fa-phone" style="margin-left: 5%;"></i> {{ $empresa->telefono }} 
                      <br />
                      <i class="fa fa-window-restore" style="margin-left: 5%;"></i> {{ $empresa->rubro }}</p>

                      <div class="btn-group" style="margin-left: 5%;">
                        <button type="button" style="margin-bottom: 15%;" onclick="location.href = 'VerEmpresa/{{ $empresa->id }}'" class="btn btn-primary">
                        Ver Empresa</button>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block centradito" src="http://localhost/urumarkets/imagenes/propaganda2.JPG" data-holder-rendered="true">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="btn btn-primary" style="color: white;">Tecnologia hasta 40% OFF</h5>
            <br>
            <p class="btn btn-dark" style="color: white;">Disfruta de la mejor tecnologia al mejor precio.</p>
          </div>
        </div>
        <div class="carousel-item ">
          <img class="d-block centradito" src="http://localhost/urumarkets/imagenes/comida7.JPG" data-holder-rendered="true">
          <div class="carousel-caption d-none d-md-block" >
            <h5 class="btn btn-danger btnprop" id="comrap">Comida Rapida</h5>
            <br>
            <div style="display: inline-flex;width: auto;margin-left: auto;margin-right: auto;">
              @php
              $contador = 0
              @endphp
              @foreach ($empresas as $empresa)
              @if ($empresa->rubro == "Comida Rapida" && $contador < 2)
              @php
              $contador++
              @endphp
              <div class="container posicion" style="color: black;text-align: left;">
                <div class="card mb-3 xd" style="max-width: 540px;">
                  <div class="row g-0" style="margin-right: 0px;margin-left: 0px;">
                    <div class="col-md-4 imagenxd">

                      <img
                      align="middle"
                      src="storage/empresa/{{ $empresa->imagen }} "
                      alt="..."
                      style="height:auto;object-fit: fill;"
                      class="img-fluid"
                      />

                    </div>
                    <div class="col-md-8" style="padding-left: 0px;padding-right: 0px; border: 1px solid #D9D7D7; float: left;" >
                      <h4 style=" border-bottom: 1px solid #D9D7D7;">{{ $empresa->nombreFantasia }}</h4>
                      <small style="margin-left: 2%;"><cite title="{{ $empresa->dnombre}}, {{ $empresa->lnombre}}">{{ $empresa->direccion }} <i class="fa fa-map-marker"></i></cite></small>
                      <p>
                        <i class="fa fa-envelope" style="margin-left: 5%;"></i> {{ $empresa->email }} 
                        <br />
                        <i class="fa fa-phone" style="margin-left: 5%;"></i> {{ $empresa->telefono }} 
                        <br />
                        <i class="fa fa-window-restore" style="margin-left: 5%;"></i> {{ $empresa->rubro }}</p>

                        <div class="btn-group" style="margin-left: 5%;">
                          <button type="button" style="margin-bottom: 15%;" onclick="location.href = 'VerEmpresa/{{ $empresa->id }}'" class="btn btn-primary">
                          Ver Empresa</button>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <img class="d-block centradito" src="http://localhost/urumarkets/imagenes/propaganda3.JPG" data-holder-rendered="true">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="btn btn-primary" style="color: white;">Liquidacion de Calzados</h5>
              <br>
              <p class="btn btn-dark" style="color: white;">Oferton de fin de semana, hasta un 60% OFF en championes marca ADIDAS, NIKE y PUMA.</p>
            </div>
          </div>      
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="album ">
        <div class="container">
          <div id="myConteiner" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productos as $prod)
            <div style="margin-bottom: 3%;" class="col">
              <div class="card shadow-sm caca">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $prod->descripcion }}</title><rect width="100%" height="100%" fill="#FAFAFA"></rect><image href="storage/productos/{{ $prod->foto }}" height="100%" width="100%"/></svg>
                  <div class="card-body borde">
                    <p class="card-text">{{ $prod->titulo}} - {{ $prod->tipoMoneda}}{{ $prod->precio}}</p>    
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" onclick="location.href='http://localhost/urumarkets/public/producto/{{ $prod->id }}'" value="{{ $prod->id }}" class="btn btn-sm btn-outline-secondary">VER</button>
                        @if( $prod->oferta == 1 )
                        <div class="btn btn-sm btn-danger">EN OFERTA {{ $prod->porcentajeOferta }}%</div>
                        @endif

                      </div>
                      <button type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-success"> Agregar al carrito <i class="bi-cart-fill me-1"></i></button>
                      <!-- <small class="text-muted">9 mins</small> -->
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <style type="text/css">
          .tujavie{
            /*margin: 2%;*/
            width: 100%;
            /*padding: 1%;*/
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%;
          }

          .borde{ 
            border-top: 1px solid #777;
            margin-top: 2%;
          } 

          .caca:hover {
            border: 1px solid #777;
          }

          .centradito{
            margin-left: auto;
            margin-right: auto;
            width: 90%;
          }
          .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

          small {
            display: block;
            line-height: 1.428571429;
            color: #999;
          }
          .imagenxd{
            padding-right:0px;
            padding-left: 0px;
            border-top: 1px solid #D9D7D7;
            border-left: 1px solid #D9D7D7;
            border-bottom: 1px solid #D9D7D7; 
            background-color: #EEE;
            display:flex;
            justify-content: center;
            align-items: center;
          }

          .posicion{
            display: inline-block;
            width: 50%;
            margin: 0;
          }

          .xd:hover {
            border: 1px solid #777;
          }

          .btnprop{
            color: white;
            margin-left: auto;
            margin-right: auto;
            padding: 1%;
            font-size: 25px;
          }

          #elect:not(:disabled):not(.disabled) {
            cursor: default;
          }
          #elect:hover{
            background-color: #3490dc;
            border-color: #3490dc;
          }

          #comrap:not(:disabled):not(.disabled) {
            cursor: default;
          }
          #comrap:hover{
            background-color: #e3342f;
            border-color: #e3342f;
          }

        </style>
      </body>
      <script type="text/javascript">
        /*$('#carouselExampleCaptions').on('click', function () {
          $('.carousel').carousel('pause');
        })*/
      </script>
      </html>