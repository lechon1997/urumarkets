<!DOCTYPE html>
<html lang="es">	
	<head>
		<script src="{{ asset('js/app.js') }}"></script>
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="../css/controllerProducto/altaProducto.css">		
		<script src="../js/controllerProducto/altaProducto.js"></script>
	</head>	
	<body>
		@include('layouts.headerVisitante')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<form action="altaProducto" method="POST" class="centrado" enctype="multipart/form-data">
			{{ csrf_field()}}
			<div class="form-group tamanio">
				<label for="tipoPublicacion">Tipo de publicación:</label>
				<div class="btn-group btn-group-toggle" id = "tipoPublicacion" data-toggle="buttons">
				  <label id = "labelProducto" class="btn btn-secondary active">
				    <input type="radio" name="publicacion" id="producto" value = "productito" autocomplete="off" checked> Producto
				  </label>
				  <label id = "labelServicio" class="btn btn-secondary">
				    <input type="radio" name="publicacion" id="servicio" value = "servicito" autocomplete="off"> Servicio
				  </label>
				</div>
			</div>
			<div class="form-group tamanio">
					<label for="nombreProducto">Nombre del producto:</label>
					<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Milanesa">
			</div>
			<div class="form-group">
				<div class="input-group">			
						<div class="input-group-prepend">
							<span class="input-group-text">Descripción del producto:</span>
						</div>
						<textarea class="form-control" aria-label="Descripción" id="descripcionProducto" name="descripcionProducto" placeholder="1kg de milanesa"></textarea>
				</div>
			</div>
			<div class="form-group tamanio">
				<label for ="checkboxTienePrecio" >¿El producto tendrá precio?</label>
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="checkboxTienePrecio" name="checkboxTienePrecio" >
					<label class="custom-control-label" for="checkboxTienePrecio">Si - No</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="tipoMP" id="tipo">
					<label for ="tipoMoneda" >Tipo de moneda:</label>		
					<select class="custom-select" id="tipoMoneda" name="tipoMoneda">
						<option selected value="$">$</option>
						<option value="U$S">U$S</option>
					</select>
				</div>
				<div class="tipoMP tamanio" id="precio">
					<label for="precioProducto">Precio del producto:</label>
					<input class="form-control" id="precioProducto" name="precioProducto" type="number">
				</div>
			</div>
			<div class="form-group row">
				<div class="tipoMP col-md-5" id="tipo">
					<label for="checkboxOferta">¿El producto se encuentra en oferta?</label>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" checked="" id="checkboxOferta" name="checkboxOferta" >
							<label class="custom-control-label" for="checkboxOferta">Si - No</label>
						</div>
				</div>
				<div class="tipoMP tamanio" id="precio">
					<label >Porcentaje de la oferta:</label>
					<input class="form-control" id="porcentajeOfertaProducto" name="porcentajeOfertaProducto" type="number">
				</div>
			</div>
			<div class="form-group tamanio">
					<label for="estadoProducto">Estado del producto:</label>
					<select class="custom-select" id="estadoProducto" name="estadoProducto">
						<option selected value="Activo">Activo</option>
						<option value="Pendiente">Pendiente</option>
						<option value="Inactivo">Inactivo</option>
					</select>
			</div>
			<div class="form-group tamanio">
					<label for="stockProducto">Stock</label>
					<input class="form-control" id="stockProducto" name="stockProducto" type="number">
			</div>
			<div class="form-group tamanio">
					<label for="productosPorPersona">Límite de productos por persona:</label>
					<input class="form-control" id="productosPorPersona" name="productosPorPersona" type="number">
			</div>
			<div class="form-group">
				<input type="file" id = "file" name="file" required>
				<div class="form-group boton">						
					<button id= "validar" type="submit" class="btn btn-primary">Crear producto</button>
				</div>
			</div>		
		</form>

		<script type="text/javascript">
			$(document).ready(function() {
				//Chequeo esto siempre cuando arranca.
				$("#checkboxTienePrecio").prop("checked", true);

				$("input:radio[name=publicacion]").click(function () {    
					var seleccion = $('input:radio[name=publicacion]:checked').val();
					var boton = document.getElementById("labelServicio");
					var boton2 = document.getElementById("labelProducto");
					if(seleccion == "servicito"){					
						$("#stockProducto").prop('disabled', true);
						$("#productosPorPersona").prop('disabled', true);
						$("#stockProducto").prop('value', "");	
						$("#productosPorPersona").prop('value', "");

						$("#labelServicio").removeClass("btn-secondary");
						$("#labelServicio").addClass("btn-primary");
						$("#labelProducto").removeClass("btn-primary");	
						$("#labelProducto").addClass("btn-secondary");						
																		
					}else{
						$("#stockProducto").removeAttr('disabled');
						$("#productosPorPersona").removeAttr('disabled');

						$("#labelProducto").addClass("btn-primary");
						$("#labelProducto").removeClass("btn-secondary");
						$("#labelServicio").addClass("btn-secondary");					

					}
    			});
			});

			function estaChequeado(){
				if (document.getElementById('checkboxTienePrecio').checked){
					$("#tipoMoneda").removeAttr('disabled');
					$("#precioProducto").removeAttr('disabled');			
				}else{
					$("#tipoMoneda").prop('disabled', true);
					$("#precioProducto").prop('disabled', true);
					$("#precioProducto").prop('value', "");	
				}
			}
			$("#checkboxTienePrecio").on("click", estaChequeado);

			function validarInputs(){
				var nombreProducto = $('#nombreProducto').val();
				var descripcionProducto = $('#descripcionProducto').val();
				var tienePrecio = $('#checkboxTienePrecio').is(':checked');
				var precioProducto = $("#precioProducto").val();
				var limitePorPersona = $('#limitePorPersona').val();
				var stock = $("#stockProducto").val();
				var esProducto = $('input:radio[name=publicacion]:checked').val();
				var estaEnOferta = $('#checkboxOferta').is(':checked');
				var porcentajeOferta = $('#porcentajeOfertaProducto').val();				

				console.log(estaEnOferta);

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
				}else if(estaEnOferta){						
					if(porcentajeOferta = ""){
						alert("Debe ingresar el porcentaje de oferta.");
						return false;
					}
				}else if(esProducto == "productito" && limitePorPersona == ""){
					alert("Debe ingresar el limite por persona del producto");
					return false;
				}else if(esProducto == "productito" && stock == ""){
					alert("Debe ingresar el stock del producto");
					return false;
				}  		
			}
				$("#validar").on("click", validarInputs);
		</script>
    </body>
</html>