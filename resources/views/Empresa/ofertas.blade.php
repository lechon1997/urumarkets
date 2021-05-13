<!DOCTYPE html>
<html>
<head><script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>Ofertas</title>
</head>
@include('layouts.headerVisitante')
</head>
<body>
	{{ csrf_field()}}
	<div class="album py-5 ">
		<div class="container">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				@foreach ($productos as $prod)
				<div class="col">
					<div class="card shadow-sm">
						<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $prod->descripcion }}</title><rect width="100%" height="100%" fill="#55595c"></rect><image href="https://www.adslzone.net/app/uploads-adslzone.net/2021/01/ofertas.jpg" height="100%" width="100%"/></svg>

						<div class="card-body">
							<p class="card-text">{{ $prod->titulo }}</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-secondary">Ver</button>
									<button type="button" class="btn btn-sm btn-outline-danger">%20</button>
								</div>
								<!-- <small class="text-muted">9 mins</small> -->
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</body>
</html>