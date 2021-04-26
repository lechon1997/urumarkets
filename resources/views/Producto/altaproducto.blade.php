<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">	
	<head>
		<link rel="stylesheet" href="../css/controllerProducto/altaProducto.css">
		<script src="../public/js/app.js"></script>
		<script src="../js/controllerProducto/altaProducto.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	@include('layouts.headerVisitante')
	<body>
		<form>
			<div class="form-group">
				<div class="col-2">
					<label for="formGroupExampleInput">Nombre del producto:</label>
					<input type="text" class="form-control" id="nombreProducto" placeholder="Milanesa de pepino lubricado">
				</div>
			</div>
			<div class="form-group">
				<div class="col-5">
					<div class="input-group">			
						<div class="input-group-prepend">
							<span class="input-group-text">Descripción del producto</span>
						</div>
						<textarea class="form-control" aria-label="Descripción" placeholder="1kg de milanesa"></textarea>
					</div>
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-2 tipoMP">
					<label for ="inputGroupSelect01" >Tipo de moneda:</label>		
					<select class="custom-select" id="inputGroupSelect01">
						<option selected value="1">$</option>
						<option value="2">U$S</option>
					</select>
				</div>
				<div class="col-2">
					<label for="ex2">Precio del producto</label>
					<input class="form-control" id="ex2" type="text">
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<label for="customCheck1">Se encuentra en oferta</label>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Si / No</label>
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
    </body>
</html>