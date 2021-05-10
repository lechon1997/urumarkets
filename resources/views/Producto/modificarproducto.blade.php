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
		<form action="../modificarProd/idProd={{$producto->id}}/idPub={{$producto->publicacion_id}}" method="get" class="centrado">
			{{ csrf_field()}}
			<div class="form-group tamanio">
					<label for="formGroupExampleInput">Nombre del producto:</label>
					<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="{{$producto->titulo}}" 
					placeholder="Milanesa">
			</div>
			<div class="form-group">
				<div class="input-group">			
						<div class="input-group-prepend">
							<span class="input-group-text">Descripción del producto:</span>
						</div>
						<textarea class="form-control" aria-label="Descripción" id="descripcionProducto" name="descripcionProducto"
						placeholder="1kg de milanesa">{{$producto->descripcion}}</textarea>
				</div>
			</div>
			<div class="form-group tamanio">
				<label for ="checkboxTienePrecio" >¿El producto tendrá precio?</label>
					<div class="custom-control custom-checkbox">
					@if($producto->conPrecio == 1)
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
						@if($producto->tipoMoneda == 'U$S')
							<option value="$">$</option>
							<option selected value="U$S">U$S</option>
						@else
							<option selected value="$">$</option>
							<option value="U$S">U$S</option>
						@endif
					</select>
				</div>
				<div class="tipoMP tamanio" id="precio">
					<label for="precioProducto">Precio del producto:</label>
					@if($producto->precio == "")
						<input class="form-control" id="precioProducto" name="precioProducto" type="number">
					@else
						<input class="form-control" id="precioProducto" name="precioProducto" value="{{$producto->precio}}" type="number">
					@endif
				</div>
			</div>
			<div class="form-group">
					<label for="customCheck1">¿El producto se encuentra en oferta?</label>
					<div class="custom-control custom-checkbox">
						@if($producto->oferta == 1)
							<input type="checkbox" class="custom-control-input" checked="" id="checkboxOferta" name="checkboxOferta" checked>
						@else
							<input type="checkbox" class="custom-control-input" checked="" id="checkboxOferta" name="checkboxOferta" >  
						@endif						
						<label class="custom-control-label" for="checkboxOferta">Si - No</label>
					</div>		
			</div>
			<div class="form-group tamanio">
					<label for="estadoProducto">Estado del producto:</label>
					<select class="custom-select" id="estadoProducto" name="estadoProducto">
						@if($producto->estado == "Activo")
							<option selected value="Activo">Activo</option>
							<option value="Pendiente">Pendiente</option>
							<option value="Inactivo">Inactivo</option>
						@elseif($producto->estado == "Pendiente")
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
			<div class="form-group tamanio">
					<label for="stockProducto">Stock</label>
					<input class="form-control" id="stockProducto" name="stockProducto" value="{{$producto->stock}}" type="number">
			</div>
			<div class="form-group tamanio">
					<label for="productosPorPersona">Límite de productos por persona:</label>
					<input class="form-control" id="productosPorPersona" name="productosPorPersona" value="{{$producto->limitePorPersona}}" 
					type="number">
			</div>
			<div class="form-group">
				<label>Foto del producto:</label>				
					<div class="custom-file">
		  				<input type="file" class="custom-file-input" id="customFileLang" lang="es" onchange="preview_image(event)">
		  				<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
		  			</div>
		  				<br>
		  				<br>
		  				<img id="output_image" height=200px width=200px\>
				<div class="form-group boton">						
					<button id= "validar" type="submit" class="btn btn-primary">Crear producto</button>
				</div>
			</div>		
		</form>

		<script type="text/javascript">

			function estaChequeado(){
				if (document.getElementById('checkboxTienePrecio').checked){
					$("#tipoMoneda").removeAttr('disabled');
					$("#precioProducto").removeAttr('disabled');			
				}else{
					$("#tipoMoneda").prop('disabled', true);
					$("#precioProducto").prop('disabled', true);	
				}
			}
			$("#checkboxTienePrecio").on("click", estaChequeado);

			function validarInputs(){
				var nombreProducto = $('#nombreProducto').val();
				var descripcionProducto = $('#descripcionProducto').val();
				var tienePrecio = $('#checkboxTienePrecio').is(':checked');
    			//var tipoMoneda = $("#tipoMoneda").val();
    			var precioProducto = $("#precioProducto").val();
			    //var enOferta = $('#checkboxOferta').is(':checked');
			    //var estadoProducto = $('#estadoProducto').val();
			    var limitePorPersona = $('#limitePorPersona').val();
			    var stock = $("#stockProducto").val();

			    if(nombreProducto == ""){
			    	alert("Debe ingresar el nombre del producto");
			    	return false;
			    }else if(descripcionProducto == ""){
			    	alert("Debe ingresar la descripción del producto");
			    	return false;
			    }else if(tienePrecio){
			    	if(precioProducto == ""){
			    		alert("Debe ingresar el precio del producto");
			    		return false;
			    	}			
			    }else if(limitePorPersona == ""){
			    	alert("Debe ingresar el limite por persona del producto");
			    	return false;
			    }else if(stock == ""){
			    	alert("Debe ingresar el stock del producto");
			    	return false;
			    }  		
			}
			$("#validar").on("click", validarInputs);

		</script>
    </body>
</html>