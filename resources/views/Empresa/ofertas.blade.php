<!DOCTYPE html>
<html>

<head>
	<script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>Ofertas</title>
</head>

<body>
	@include('layouts.headerVisitante')
	<div class="album ">

		<div class="container">
			<div class="d-flex pt-4 pb-3 flex-row-reverse">
				<div>
					<select id="orderby" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
						<option value="0" selected>Por defecto</option>
						<option value="1">Precio (mayor a menor)</option>
						<option value="2">Precio (menor a mayor)</option>
					</select>
				</div>

				<div class="mr-2 ">
					<label>Ordenar por: </label>
				</div>
			</div>
			<div id="myConteiner" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				@foreach ($productos as $prod)
				<div style="margin-bottom: 3%;" class="col">
					<div class="card shadow-sm">
						<div style="width:100%; height:225px;">
							<img src="storage/productos/{{ $prod->foto }}" style="width:100%;height:225px;object-fit:scale-down;"></img>
						</div>
						<div class="card-body">
							<p class="card-text">{{ $prod->titulo }}</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-secondary">Ver</button>
									<button type="button" class="btn btn-sm btn-outline-danger">EN OFERTA {{ $prod->porcentajeOferta }}%</button>
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
	<script>
		$('#orderby').on('change', function() {
			
			$("#myConteiner").empty();
			var opcionUsu = $('#orderby').val();
			var urlWS = "";
			switch (opcionUsu) {
				case "1":
					urlWS = "http://localhost/urumarkets/public/MayorMenor";
					break;
				case "2":
					urlWS = "http://localhost/urumarkets/public/MenorMayor";
					break;
				default:
					urlWS = "http://localhost/urumarkets/public/default";
					break;
			}

			console.log(urlWS);
			$.ajax({
				url: urlWS,
				dataType: "json",
				method: "GET",
				success: function(res) {
					console.log(res);
					cant = Object.keys(res).length;
					for (let i = 0; i < cant; i++) {


						//CONTENEDOR DE CADA PUBLICACION
						var divContCard = $('<div>').attr("class", "col")
							.attr("style", "margin-bottom: 3%;");
						$("#myConteiner").append(divContCard);

						//CONTENEDOR-CARD
						var divCard = $('<div>').attr("class", "card shadow-sm");
						divContCard.append(divCard);

						var divCtnImg = $('<div>').css("width", "100%")
							.css("height", "225px")

						divCard.append(divCtnImg);

						//DESCRIPCION DEL PRODUCTO
						var titulo = $('<title>');
						titulo.text(res[i].descripcion);


						//RECTANGULO BIEN NAZI


						//IMAGEN DEL PRODUCTO
						var urlimg = "storage/productos/" + res[i].foto;
						console.log(urlimg)
						var imagen = $('<img>').attr("src", urlimg)
							.attr("width", "100%")
							.attr("height", "225px")
							.css("object-fit", "scale-down")

						divCtnImg.append(titulo);
						divCtnImg.append(imagen);
						urlimg = "";

						var divCardBody = $('<div>').attr("class", "card-body");
						divCard.append(divCardBody);

						var pTit = $('<p>').attr("class", "card-text");
						pTit.text(res[i].titulo);
						divCardBody.append(pTit);

						var divShrek = $('<div>').attr("class", "d-flex justify-content-between align-items-center");
						divCardBody.append(divShrek);

						var divBtnG = $('<div>').attr("class", "btn-group");
						divShrek.append(divBtnG);
						//<button type="button" value="{{ $prod->id }}" class="btn btn-sm btn-outline-secondary">Ver</button>
						var divBtnVer = $('<button>').attr("type", "button")
							.attr("value", res[i].id)
							.attr("class", "btn btn-sm btn-outline-secondary");
						divBtnVer.text("Ver");
						divBtnG.append(divBtnVer);



						//<button type="button" class="btn btn-sm btn-outline-danger">EN OFERTA {{ $prod->porcentajeOferta }}%</button>
						var divBtnOferta = $('<button>').attr("type", "button")
							.attr("class", "btn btn-sm btn-outline-danger");
						var oferta = "EN OFERTA " + res[i].porcentajeOferta + "%";
						divBtnOferta.text(oferta);
						divBtnG.append(divBtnOferta);
						oferta = "";
					}

				}
			});
		});
	</script>
</body>

</html>