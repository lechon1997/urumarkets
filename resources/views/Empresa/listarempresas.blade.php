<!DOCTYPE html>
<html>
	<head>
		<script src="{{ asset('js/app.js') }}"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>Empresas</title>
	</head>
@include('layouts.headerVisitante')
	
	<body>
		<br />
		<div class="container">
			@foreach ($empresas as $empresa)
			@if($empresa->deshabilitado == 0)
				<div class="card mb-3" style="max-width: 540px;">
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
			<style type="text/css">
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
				

			</script>
		</body>
</html>