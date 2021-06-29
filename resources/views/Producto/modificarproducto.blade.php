<!DOCTYPE html>
<html lang="es">	
	<head>
		<script src="{{ asset('js/app.js') }}"></script>
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="../../css/controllerProducto/altaProducto.css">		
		<script src="../../js/controllerProducto/altaProducto.js"></script>
	</head>	
	<body>
		@include('layouts.headerVisitante')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<form action="../modificarProd/{{$publicacion->publicacion_id}}&{{$publicacion->tipoPub}}"
		method="POST" class="centrado" enctype="multipart/form-data">
			{{ csrf_field()}}
			<div class="form-group tamanio">
					@if($publicacion->tipoPub == "producto")
					<label for="formGroupExampleInput">Nombre del producto:</label>
					@else
					<label for="formGroupExampleInput">Nombre del servicio:</label>
					@endif
					<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="{{$publicacion->titulo}}" 
					placeholder="Milanesa">
			</div>
			<div class="form-group">
				<div class="input-group">			
						<div class="input-group-prepend">
							<span class="input-group-text">Descripción:</span>
						</div>
						<textarea class="form-control" aria-label="Descripción" id="descripcionProducto" name="descripcionProducto"
						placeholder="1kg de milanesa">{{$publicacion->descripcion}}</textarea>
				</div>
			</div>
			<div class="form-group tamanio">
				@if($publicacion->tipoPub == "producto")
					<label for ="checkboxTienePrecio" >¿El producto tendrá precio?</label>
				@else
					<label for ="checkboxTienePrecio" >¿El servicio tendrá precio?</label>
				@endif
					<div class="custom-control custom-checkbox">
					@if($publicacion->conPrecio == 1)
						<input type="checkbox" class="custom-control-input" id="checkboxTienePrecio" name="checkboxTienePrecio" checked>
					@else
						<input type="checkbox" class="custom-control-input" id="checkboxTienePrecio" name="checkboxTienePrecio">
					@endif				
					<label class="custom-control-label" for="checkboxTienePrecio">Si - No</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="tipoMP" id="tipo">
					<label for ="tipoMoneda" >Tipo de moneda:</label>		
					<select class="custom-select" id="tipoMoneda" name="tipoMoneda">
						@if($publicacion->tipoMoneda == 'U$S')
							<option value="$">$</option>
							<option selected value="U$S">U$S</option>
						@else
							<option selected value="$">$</option>
							<option value="U$S">U$S</option>
						@endif
					</select>
				</div>
				<div class="tipoMP tamanio" id="precio">
					@if($publicacion->tipoPub == "producto")
						<label for="precioProducto">Precio del producto:</label>
					@else
						<label for="precioProducto">Precio del servicio:</label>
					@endif

					@if($publicacion->precio == "")
						<input class="form-control" id="precioProducto" name="precioProducto" type="number">
					@else
						<input class="form-control" id="precioProducto" name="precioProducto" 
						value="{{$publicacion->precio}}" type="number">
					@endif
				</div>
			</div>
			<div class="form-group row">
				<div class="tipoMP col-md-5" id="tipo">
					@if($publicacion->precio == "")
						<label for="customCheck1">¿El producto se encuentra en oferta?</label>
					@else
						<label for="customCheck1">¿El servicio se encuentra en oferta?</label>
					@endif
					
					<div class="custom-control custom-checkbox">
						@if($publicacion->oferta == 1)
							<input type="checkbox" class="custom-control-input" checked="" id="checkboxOferta" name="checkboxOferta" checked>
						@else
							<input type="checkbox" class="custom-control-input" id="checkboxOferta" name="checkboxOferta" >  
						@endif						
						<label class="custom-control-label" for="checkboxOferta">Si - No</label>
					</div>
				</div> 	
				<div class="tipoMP tamanio" id="precio">
					<label for = "porcentajeOfertaProducto">Porcentaje de la oferta:</label>
					@if($publicacion->oferta == "")
						<input class="form-control" id="porcentajeOfertaProducto" name="porcentajeOfertaProducto"
						type="number">
					@else
						<input class="form-control" id="porcentajeOfertaProducto" name="porcentajeOfertaProducto"
						value="{{$publicacion->oferta}}" type="number">
					@endif					
				</div>
			</div>
			<div class="form-group tamanio">
				@if($publicacion->tipoPub == "producto")
					<label for="estadoProducto">Estado del producto:</label>
				@else
					<label for="estadoProducto">Estado del servicio:</label>
				@endif

				<select class="custom-select" id="estadoProducto" name="estadoProducto">
					@if($publicacion->estado == "Activo")
						<option selected value="Activo">Activo</option>
						<option value="Pendiente">Pendiente</option>
						<option value="Inactivo">Inactivo</option>
					@elseif($publicacion->estado == "Pendiente")
						<option value="Activo">Activo</option>
						<option selected value="Pendiente">Pendiente</option>
						<option value="Inactivo">Inactivo</option>
					@else
						<option value="Activo">Activo</option>
						<option value="Pendiente">Pendiente</option>
						<option selected value="Inactivo">Inactivo</option>
					@endif
				</select>
			</div>
			@if($publicacion->tipoPub == "producto")
				<div class="form-group tamanio">
					<label for="stockProducto">Stock</label>
					@if($publicacion->stock == "")
					<input class="form-control" id="stockProducto" name="stockProducto" type="number">
					@else
					<input class="form-control" id="stockProducto" name="stockProducto" value="{{$publicacion->stock}}" type="number">
					@endif
				</div>
				<div class="form-group tamanio">
					<label for="productosPorPersona">Límite de productos por persona:</label>
					@if($publicacion->limitePorPersona == "")
						<input class="form-control" id="productosPorPersona" name="productosPorPersona" 
						value="{{$publicacion->limitePorPersona}}" type="number">
					@else
						<input class="form-control" id="productosPorPersona" name="productosPorPersona" 
						type="number">
					@endif			
				</div>
			@else
				<div class="form-group tamanio">
					<label for="stockProducto">Stock</label>
					<input class="form-control" disabled ="" id="stockProducto" name="stockProducto" value="{{$publicacion->stock}}" type="number">
				</div>
				<div class="form-group tamanio">
					<label for="productosPorPersona">Límite de productos por persona:</label>
					<input class="form-control" disabled ="" id="productosPorPersona" name="productosPorPersona" value="{{$publicacion->limitePorPersona}}" 
					type="number">
				</div>
			@endif
			
			<div class="form-group">
				@if($publicacion->tipoPub == "producto")
					<label>Seleccione una foto para el producto:</label>
				@else
					<label>Seleccione una foto para el servicio:</label>
				@endif							
					<div class="custom-file">
		  				<input type="file" class="custom-file-input" id="file" name= "file" lang="es" onchange="preview_image(event)">
		  				<label class="custom-file-label" data-browse="Examinar" for="customFileLang">Seleccionar Archivo</label>
		  			</div>
		  				<br>
		  				<br>		  				
		  				<img id="output_image" src="../storage/productos/{{$publicacion->foto}}" height=200px width=200px\>
				<div class="form-group boton">
					@if($publicacion->tipoPub == "producto")
						<button id= "validar" type="submit" class="btn btn-primary">Modificar producto</button>
					@else
						<button id= "validar" type="submit" class="btn btn-primary">Modificar servicio</button>
					@endif
					<input type="hidden" id="tipopublicacionpa" name="{{$publicacion->tipoPub}}">								
				</div>
			</div>		
		</form>

		<script type="text/javascript">

			$(document).ready(function() {
				if (document.getElementById('checkboxOferta').checked){
					$("#porcentajeOfertaProducto").removeAttr('disabled');
				}else{
					$("#porcentajeOfertaProducto").prop('disabled', true);
				}

				if (document.getElementById('checkboxTienePrecio').checked){
					$("#tipoMoneda").removeAttr('disabled');
					$("#precioProducto").removeAttr('disabled');
				}else{
					$("#tipoMoneda").prop('disabled', true);
					$("#precioProducto").prop('disabled', true);
				}

			});

			function estaChequeado(){
				if (document.getElementById('checkboxTienePrecio').checked){
					$("#tipoMoneda").removeAttr('disabled');
					$("#precioProducto").removeAttr('disabled');			
				}else{
					$("#tipoMoneda").prop('disabled', true);
					$("#precioProducto").prop('disabled', true);
					$("#precioProducto").val("");	
				}
			}
			$("#checkboxTienePrecio").on("click", estaChequeado);

			function estaChequeado2(){
				if (document.getElementById('checkboxOferta').checked){
					$("#porcentajeOfertaProducto").removeAttr('disabled');
				}else{
					$("#porcentajeOfertaProducto").prop('disabled', true);
					$("#porcentajeOfertaProducto").val("");
				}
			}
			$("#checkboxOferta").on("click", estaChequeado2);

			function validarInputs(){
				var nombreProducto = $('#nombreProducto').val();
				var descripcionProducto = $('#descripcionProducto').val();
				var tienePrecio = $('#checkboxTienePrecio').is(':checked');
    			//var tipoMoneda = $("#tipoMoneda").val();
    			var precioProducto = $("#precioProducto").val();
			    var enOferta = $('#checkboxOferta').is(':checked');
			    //var estadoProducto = $('#estadoProducto').val();
			    var limitePorPersona = $('#limitePorPersona').val();
			    var producto = $('#tipopublicacionpa').val();
			    var stock = $("#stockProducto").val();
			    var porcentajeOferta = $("#porcentajeOfertaProducto").val();			    

			    if(producto){
			    	if(nombreProducto == ""){
			    		alert("Debe ingresar el nombre del producto");
			    		return false;
			    	}else if(descripcionProducto == ""){
			    		alert("Debe ingresar la descripción del producto");
			    		return false;
			    	}else if(tienePrecio){
			    		if(precioProducto == "" || precioProducto == 0){
			    			alert("Debe ingresar el precio del producto");
			    			return false;
			    		}			
			    	}else if(enOferta){
			    		if(porcentajeOferta == ""){
			    			alert("Debe ingresar el porcentaje de oferta del producto");
			    			return false;
			    		}
			    	}else if(limitePorPersona == ""){
			    		alert("Debe ingresar el limite por persona del producto");
			    		return false;
			    	}else if(stock == ""){
			    		alert("Debe ingresar el stock del producto");
			    		return false;
			    	}
			    }else{
			    	if(nombreProducto == ""){
			    		alert("Debe ingresar el nombre del servicio");
			    		return false;
			    	}else if(descripcionProducto == ""){
			    		alert("Debe ingresar la descripción del servicio");
			    		return false;
			    	}else if(tienePrecio){
			    		if(precioProducto == "" || precioProducto == 0){
			    			alert("Debe ingresar el precio del servicio");
			    			return false;
			    		}	
			    	}
			    	 if(enOferta){
			    		if(porcentajeOferta == ""){
			    			alert("Debe ingresar el porcentaje de oferta del servicio");
			    			return false;
			    		}
			    	}  		
			}
		}
		$("#validar").on("click", validarInputs);

		</script>
    </body>
</html>