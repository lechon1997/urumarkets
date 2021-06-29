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
		@csrf
		<div class="form-group tamanio">
			<label for="tipoPublicacion">Tipo de publicación:</label>
			<div class="btn-group btn-group-toggle" id = "tipoPublicacion" data-toggle="buttons">
				<label id = "labelProducto" class="btn btn-primary active">
					<input type="radio" name="publicacion" id="producto" value = "productito" autocomplete="off" checked> Producto
				</label>
				<label id = "labelServicio" class="btn btn-secondary">
					<input type="radio" name="publicacion" id="servicio" value = "servicito" autocomplete="off"> Servicio
				</label>
			</div>
		</div>
		<div class="form-group tamanio">
			<label id ="labelNombrePublicacion" for="nombreProducto"></label>
			<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Milanesa">
		</div>
		<div class="form-group">
			<div class="input-group">			
				<div class="input-group-prepend">
					<span id ="labelDescripcionPublicacion" class="input-group-text">Descripción</span>
				</div>
				<textarea class="form-control" aria-label="Descripción" id="descripcionProducto" name="descripcionProducto" placeholder="1kg de milanesa"></textarea>
			</div>
		</div>
		<div class="form-group tamanio">
			<label id ="labelchkbxPrecioPub" for ="checkboxTienePrecio" ></label>
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
				<label id ="labelPrecioPublicacion" for="precioProducto"></label>
				<input class="form-control" id="precioProducto" name="precioProducto" onkeypress="return event.charCode >= 48" type="number" min="1">
			</div>
		</div>
		<div class="form-group row">
			<div class="tipoMP col-md-5" id="tipo">
				<label id ="labelchkbxPublicacionOferta" for="checkboxOferta"></label>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" checked="" id="checkboxOferta" name="checkboxOferta" >
					<label class="custom-control-label" for="checkboxOferta">Si - No</label>
				</div>
			</div>
			<div class="tipoMP tamanio" id="precio">
				<label for = "porcentajeOfertaProducto">Porcentaje de la oferta:</label>
				<input class="form-control" id="porcentajeOfertaProducto" name="porcentajeOfertaProducto" onkeypress="return event.charCode >= 48" type="number" min="1">
			</div>
		</div>
		<div class="form-group tamanio">
			<label id ="labelEstadoPublicacion" for="estadoProducto"></label>
			<select class="custom-select" id="estadoProducto" name="estadoProducto">
				<option selected value="Activo">Activo</option>
				<option value="Pendiente">Pendiente</option>
				<option value="Inactivo">Inactivo</option>
			</select>
		</div>
		<div class="form-group tamanio">
			<label for="stockProducto">Stock</label>
			<input class="form-control" id="stockProducto" name="stockProducto" onkeypress="return event.charCode >= 48" type="number" min="0">
		</div>
		<div class="form-group tamanio">
			<label for="productosPorPersona">Límite de productos por persona:</label>
			<input class="form-control" id="productosPorPersona" name="productosPorPersona" onkeypress="return event.charCode >= 48" type="number" min="0">
		</div>
		<div class="form-group">
			<label id = "fotoPublicacion" for= "file"></label>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="file" name= "file" lang="es" onchange="preview_image(event)">
				<label class="custom-file-label" data-browse="Examinar" for="customFileLang">Seleccionar Archivo</label>
			</div>
			<br>
			<br>
			<img id="output_image" height=200px width=200px\>
			<div class="form-group boton">						
				<button id= "validar" type="submit" class="btn btn-primary"></button>
			</div>
		</div>		
	</form>

	<script type="text/javascript">
		$(document).ready(function() {
				//Chequeo esto siempre cuando arranca.
				$("#checkboxTienePrecio").prop("checked", true);

				//Siempre está chequeado el botón producto, por eso arranco así.
				document.getElementById('labelNombrePublicacion').innerHTML = 'Nombre del producto:';				
				document.getElementById('labelchkbxPrecioPub').innerHTML = '¿El producto tendrá precio?';
				document.getElementById('labelPrecioPublicacion').innerHTML = 'Precio del producto:';
				document.getElementById('labelchkbxPublicacionOferta').innerHTML = '¿El producto se encuentra en oferta?';
				document.getElementById('labelEstadoPublicacion').innerHTML = 'Estado del producto:';
				document.getElementById('fotoPublicacion').innerHTML = 'Seleccione una foto para el producto:';
				document.getElementById('validar').innerHTML = 'Crear producto';
				
				$("input:radio[name=publicacion]").click(function () {    
					var seleccion = $('input:radio[name=publicacion]:checked').val();
					var boton = document.getElementById("labelServicio");
					var boton2 = document.getElementById("labelProducto");
					
					if(seleccion == "servicito"){
						//Deshabilito el stock y los productos límite por persona
						//ya que un servicio no tiene límite.					
						$("#stockProducto").prop('disabled', true);
						$("#productosPorPersona").prop('disabled', true);
						$("#stockProducto").prop('value', "");	
						$("#productosPorPersona").prop('value', "");

						//Acá cambio las clases del botón así cambia de color al 
						//clickearlo.
						$("#labelServicio").removeClass("btn-secondary");
						$("#labelServicio").addClass("btn-primary");
						$("#labelProducto").removeClass("btn-primary");	
						$("#labelProducto").addClass("btn-secondary");

						//Si hace click en servicio tengo que cambiar los labels.
						document.getElementById('labelNombrePublicacion').innerHTML = 'Nombre del servicio:';
						document.getElementById('labelchkbxPrecioPub').innerHTML = '¿El servicio tendrá precio?';
						document.getElementById('labelPrecioPublicacion').innerHTML = 'Precio del servicio:';
						document.getElementById('labelchkbxPublicacionOferta').innerHTML = '¿El servicio se encuentra en oferta?';
						document.getElementById('labelEstadoPublicacion').innerHTML = 'Estado del servicio:';
						document.getElementById('fotoPublicacion').innerHTML = 'Seleccione una foto para el servicio:';
						document.getElementById('validar').innerHTML = 'Crear servicio';					

					}else{
						//Si cambia a producto de nuevo, vuelvo a habilitar
						//los atributos que había deshabilitado antes.
						$("#stockProducto").removeAttr('disabled');
						$("#productosPorPersona").removeAttr('disabled');

						//Cambio las clases correspondientes como arriba.
						$("#labelProducto").addClass("btn-primary");
						$("#labelProducto").removeClass("btn-secondary");
						$("#labelServicio").addClass("btn-secondary");

						//Si hace click en producto tengo que cambiar los labels.
						document.getElementById('labelNombrePublicacion').innerHTML = 'Nombre del producto:';
						document.getElementById('labelNombrePublicacion').innerHTML = 'Descripción del producto:';
						document.getElementById('labelchkbxPrecioPub').innerHTML = '¿El producto tendrá precio?';
						document.getElementById('labelPrecioPublicacion').innerHTML = 'Precio del producto:';
						document.getElementById('labelchkbxPublicacionOferta').innerHTML = '¿El producto se encuentra en oferta?';
						document.getElementById('labelEstadoPublicacion').innerHTML = 'Estado del producto:';
						document.getElementById('fotoPublicacion').innerHTML = 'Seleccione una foto para el producto:';
						document.getElementById('validar').innerHTML = 'Crear producto';
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

		function estaChequeado2(){
			if (document.getElementById('checkboxOferta').checked){
				$("#porcentajeOfertaProducto").removeAttr('disabled');
			}else{
				$("#porcentajeOfertaProducto").prop('disabled', true);
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
			var producto = $('input:radio[name=publicacion]:checked').val();
			var stock = $("#stockProducto").val();
			var porcentajeOferta = $("#porcentajeOfertaProducto").val();			    
			console.log(enOferta);
			console.log(porcentajeOferta);
			
			if(producto == "productito"){
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
				}else if(limitePorPersona == ""){
					alert("Debe ingresar el limite por persona del producto");
					return false;
				}else if(stock == ""){
					alert("Debe ingresar el stock del producto");
					return false;
				}
				if(enOferta){
					if(porcentajeOferta == ""){
						alert("Debe ingresar el porcentaje de oferta del producto");
						return false;
					}
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
						alert("Debe ingresar el porcentaje de oferta del producto");
						return false;
					}
				}  		
			}
		}
		$("#validar").on("click", validarInputs);
	</script>
</body>
</html>