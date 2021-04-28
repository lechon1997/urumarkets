<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">	
	<head>
		<link rel="stylesheet" href="../css/controllerProducto/altaProducto.css">
		
		<script src="../js/controllerProducto/altaProducto.js"></script>
	</head>	
	<body>
		@include('layouts.headerVisitante')
		<form action="altaProducto" method="POST">
			{{ csrf_field()}}
			<div class="form-group">
				<div class="col-2">
					<label for="formGroupExampleInput">Nombre del producto:</label>
					<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Milanesa">
				</div>
			</div>
			<div class="form-group">
				<div class="col-5">
					<div class="input-group">			
						<div class="input-group-prepend">
							<span class="input-group-text">Descripción del producto</span>
						</div>
						<textarea class="form-control" aria-label="Descripción" id="descripcionProducto" name="descripcionProducto" placeholder="1kg de milanesa"></textarea>
					</div>
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-2 tipoMP">
					<label for ="tipoMoneda" >Tipo de moneda:</label>		
					<select class="custom-select" id="tipoMoneda" name="tipoMoneda">
						<option selected value="$">$</option>
						<option value="U$S">U$S</option>
					</select>
				</div>
				<div class="col-2">
					<label for="precioProducto">Precio del producto</label>
					<input class="form-control" id="precioProducto" name="precioProducto" type="text">
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<label for="customCheck1">Se encuentra en oferta</label>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="checkboxOferta" name="checkboxOferta" >
						<label class="custom-control-label" for="checkboxOferta">Si / No</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<div class="custom-file">
		  				<input type="file" class="custom-file-input" id="customFileLang" lang="es" onchange="preview_image(event)">
		  				<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
		  				<br>
		  				<br>
		  				<img id="output_image" height=200px width=200px\>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>

			<div class="form-group">
				<div class="col-2">
					<button type="submit" class="btn btn-primary" >Crear producto</button>
				</div>
			</div>
			
		</form>
    </body>
</html>