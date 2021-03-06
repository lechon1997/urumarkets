<!DOCTYPE html>
<html>

<head>
	<script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>Ofertas</title>
</head>

<body>

	@include('layouts.headerVisitante')


	<div id="accordion">
		<div class="card">
			<div class="card-header" id="headingOne"style="background-color: #ECE8E8;">
				<h5 class="mb-0">
					<button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<h5>Publicaciones ({{$sizeproductos}})</h5>
					</button>
				</h5>
			</div>
			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body" style="background-color: #ECE8E8;">
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
														    @if(isset($isadmin))
									                        @if($isadmin == 0)
									                          <button data-toggle="modal" data-target="#exampleModal" type="button" value="{{ $prod->id }}" class="carrito btn btn-sm btn-outline-success"> Agregar al carrito <i class="bi-cart-fill me-1"></i></button>
																							<!-- <small class="text-muted">9 mins</small> -->
									                        @else
									                          <button data-toggle="modal" data-target="#exampleModal2" type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-success"> Agregar al carrito <i class="bi-cart-fill me-1"></i></button>
																							<!-- <small class="text-muted">9 mins</small> -->
									                        @endif
									                      @else
									                          <button data-toggle="modal" data-target="#exampleModal2" type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-success"> Agregar al carrito <i class="bi-cart-fill me-1"></i></button>
																							<!-- <small class="text-muted">9 mins</small> -->
									                      @endif
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
											<p class="h5" style="color: green;">El producto se agreg?? a su carrito.</p>
										</div>
									</div>
								</div>
							</div>
								<!-- Modal -->
					          <div class="modal fade modal-auto-clear" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					            <div class="modal-dialog" role="document">
					              <div class="modal-content">
					                <div class="modal-body">
					                  <p class="h5" style="color: red;">
				                        @if(isset($isadmin))
				                        @if($isadmin == 1)
				                          Debe iniciar sesion como cliente para poder comprar.
				                          @else
				                          Debe iniciar sesion o registrarse como cliente para poder comprar.
				                        @endif
				                        @else
				                          Debe iniciar sesion o registrarse como cliente para poder comprar.
				                        @endif
					                  </p>
					                </div>
					              </div>
					            </div>
					          </div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo" style="background-color: #ECE8E8;">
						<h5 class="mb-0">
							<button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<h5>Empresas ({{$sizeempresas}})</h5>
							</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body" style="background-color: #ECE8E8;">
							<div class="container">
								@foreach ($empresas as $empresa)
								@if($empresa->deshabilitado == 0)
								<div class="card mb-3" style="max-width: 540px;">
									<div class="row g-0" style="margin-right: 0px;margin-left: 0px;">
										<div class="col-md-4 imagenxd">

											<img
											align="middle"
											src="http://localhost/urumarkets/public/storage/empresa/{{ $empresa->imagen }} "
											alt="..."
											style="height:auto;object-fit: fill;"
											class="img-fluid"
											/>

										</div>
										<div class="col-md-8" style="padding-left: 0px;padding-right: 0px; border: 1px solid #D9D7D7;" >
											<h4 style="	border-bottom: 1px solid #D9D7D7;">{{ $empresa->nombreFantasia }}</h4>
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
									@endif				
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>

			<style type="text/css">
				.borde {
					border-top: 1px solid #777;
					margin-top: 2%;
				}

				.caca:hover {
					border: 1px solid #777;
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
			</style>
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
                if(res != "servicio"){
                  let variable = $('#spanCarrito').text();
                  let variableInt = parseInt(variable);
                  variableInt+=1;
                  $('#spanCarrito').html(variableInt);   
                }                  
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