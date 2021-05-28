<!DOCTYPE html>
<html>
	<head>
		<script src="{{ asset('js/app.js') }}"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>Empresas</title>
	</head>
@include('layouts.headerVisitante')
	
	<body>
		<div class="container">
			@foreach ($empresas as $empresa)
				<div class="card mb-3" style="max-width: 540px;">
					<div class="row g-0">
						<div class="col-md-4">
							<img
							src="storage/empresa/{{ $empresa->imagen }} "
							alt="..."
							style="width:100%; height: 100%; object-fit: fill;"
							class="img-fluid"
							/>
						</div>
						<div class="col-md-8">
								<h4>{{ $empresa->nombreFantasia }}</h4>
								<small><cite title="{{ $empresa->dnombre}}, {{ $empresa->lnombre}}">{{ $empresa->direccion }} <i class="glyphicon glyphicon-map-marker">
								</i></cite></small>
								<p>
									<i class="glyphicon glyphicon-envelope"></i>{{ $empresa->email }} 
									<br />
									<i class="glyphicon glyphicon-globe"></i>{{ $empresa->telefono }} 
									<br />
									<i class="glyphicon glyphicon-gift"></i>{{ $empresa->rubro }}</p>

									<div class="btn-group">
										<button type="button" onclick="location.href = 'VerEmpresa/{{ $empresa->id }}'" class="btn btn-primary">
										Ver Empresa</button>
									</div>									
								</div>
							</div>
						</div>					
			@endforeach
		</div>
			<style type="text/css">
				.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

				small {
					display: block;
					line-height: 1.428571429;
					color: #999;
				}
			</style> 
			<script type="text/javascript">
				

			</script>
		</body>
</html>

		<!-- <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="well well-sm">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<img src="storage/empresa/{{ $empresa->imagen }} " alt="" class="img-rounded img-responsive" />
						</div>
						<div class="col-sm-6 col-md-8">
							<h4>{{ $empresa->nombreFantasia }}</h4>
								<small><cite title="{{ $empresa->dnombre}}, {{ $empresa->lnombre}}">{{ $empresa->direccion }} <i class="glyphicon glyphicon-map-marker">
								</i></cite></small>
								<p>
									<i class="glyphicon glyphicon-envelope"></i>{{ $empresa->email }} 
									<br />
									<i class="glyphicon glyphicon-globe"></i>{{ $empresa->telefono }} 
									<br />
									<i class="glyphicon glyphicon-gift"></i>{{ $empresa->rubro }}</p>

									<div class="btn-group">
										<button type="button" onclick="location.href = 'VerEmpresa/{{ $empresa->id }}'" class="btn btn-primary">
										Ver Empresa</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->