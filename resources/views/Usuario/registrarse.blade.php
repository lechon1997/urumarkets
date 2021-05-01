<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	
	@include('layouts.headerVisitante')
	<div style="margin-top: 5%;
	margin-left: 40%;">
	<label>Registrarse como:</label>
	<br>
	<button type="button" id="cliente" class="btn btn-primary btn-lg">Cliente</button>
	<button type="button" id="empresa" class="btn btn-secondary btn-lg">Empresa</button>
</div>

<script type="text/javascript">
	function redireccionarempresa() {
	  window.location.replace('AltaEmpresa'); 
	}
	function redireccionarcliente() {
	  window.location.replace('altausuario'); 
	}
	$("#empresa").on("click", redireccionarempresa);
	$("#cliente").on("click", redireccionarcliente);
</script>
</body>
</html>