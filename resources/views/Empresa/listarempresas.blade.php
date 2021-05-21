<!DOCTYPE html>
<html>
<head>
	<script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title>Empresas</title>
</head>

</head>
@include('layouts.headerVisitante')
<body>

	{{ csrf_field()}}
	@foreach ($empresas as $empresa)

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="well well-sm">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<img src="storage/empresa/{{ $empresa->imagen }} " alt="" class="img-rounded img-responsive" />
						</div>
						<div class="col-sm-6 col-md-8">
							<h4>
								{{ $empresa->nombreFantasia }}</h4>
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
										<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">Twitter</a></li>
											<li><a href="#">Google +</a></li>
											<li><a href="#">Facebook</a></li>
											<li class="divider"></li>
											<li><a href="#">Website</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
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