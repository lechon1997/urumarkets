<!DOCTYPE html>
<html>
<head><script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>UruMarkets</title>
</head>
@include('layouts.headerVisitante')
</head>
<body>
	{{ csrf_field()}}
	<div class="container emp-profile">
		<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="profile-img">
						@if( isset($tipovistaperfil) && $tipovistaperfil == "verperfil" )
							<img src="storage/empresa/{{ $usuario->imagen }}" alt=""/>
						@else
							<img src="../storage/empresa/{{ $usuario->imagen }}" alt=""/>
						@endif
						
						<!--<div class="file btn btn-lg btn-primary">
							Cambiar foto
							<input type="file" name="file"/>
						</div>-->
					</div>
				</div>
				<div class="col-md-6">
					<div class="profile-head">
						<h5>
							{{ $vendedor->nombreFantasia }}
						</h5>
						<h6>
							{{ $vendedor->rubro }}
						</h6>
						<br>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuario</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Empresa</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<!--<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="profile-work">
						<p>WORK LINK</p>
						<a href="">Website Link</a><br/>
						<a href="">Bootsnipp Profile</a><br/>
						<a href="">Bootply Profile</a>
						<p>SKILLS</p>
						<a href="">Web Designer</a><br/>
						<a href="">Web Developer</a><br/>
						<a href="">WordPress</a><br/>
						<a href="">WooCommerce</a><br/>
						<a href="">PHP, .Net</a><br/>
					</div>
				</div>
				<div class="col-md-8">
					<div class="tab-content profile-tab" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
								<div class="col-md-6">
									<label>Nombre</label>
								</div>
								<div class="col-md-6">
									<p>{{ $usuario->primerNombre }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Apellido</label>
								</div>
								<div class="col-md-6">
									<p>{{ $usuario->primerApellido }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Email</label>
								</div>
								<div class="col-md-6">
									<p>{{ $usuario->email }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Cedula</label>
								</div>
								<div class="col-md-6">
									<p>{{ $usuario->cedula }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Telefono</label>
								</div>
								<div class="col-md-6">
									<p>{{ $usuario->telefono }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Departamento</label>
								</div>
								<div class="col-md-6">
									<p>{{ $departamento->nombre }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Localidad</label>
								</div>
								<div class="col-md-6">
									<p>{{ $localidad->nombre }}</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="row">
								<div class="col-md-6">
									<label>RUT</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->RUT }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Razon Social</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->razonSocial }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Nombre Fantasia</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->nombreFantasia }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Tipo de Organizacion</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->tipoOrganizacion }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Rubro</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->rubro }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Telefono de la Empresa</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->telefonoEmpresa }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Direccion</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->direccion }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Descripcion:</label>
								</div>
								<div class="col-md-6">
									<p>{{ $vendedor->descripcion }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>           
	</div>
	<style type="text/css">
		body{
		 background: -webkit-linear-gradient(left, #3931af, #00c6ff);/* */	
		}
		.emp-profile{
			padding: 3%;
			margin-top: 3%;
			margin-bottom: 3%;
			border-radius: 0.5rem;
			background: #fff;
		}
		.profile-img{
			text-align: center;
		}
		.profile-img img{
			width: 70%;
			height: 100%;
		}
		.profile-img .file {
			position: relative;
			overflow: hidden;
			margin-top: -20%;
			width: 70%;
			border: none;
			border-radius: 0;
			font-size: 15px;
			background: #212529b8;
		}
		.profile-img .file input {
			position: absolute;
			opacity: 0;
			right: 0;
			top: 0;
		}
		.profile-head h5{
			color: #333;
		}
		.profile-head h6{
			color: #0062cc;
		}
		.profile-edit-btn{
			border: none;
			border-radius: 1.5rem;
			width: 70%;
			padding: 2%;
			font-weight: 600;
			color: #6c757d;
			cursor: pointer;
		}
		.proile-rating{
			font-size: 12px;
			color: #818182;
			margin-top: 5%;
		}
		.proile-rating span{
			color: #495057;
			font-size: 15px;
			font-weight: 600;
		}
		.profile-head .nav-tabs{
			margin-bottom:5%;
		}
		.profile-head .nav-tabs .nav-link{
			font-weight:600;
			border: none;
		}
		.profile-head .nav-tabs .nav-link.active{
			border: none;
			border-bottom:2px solid #0062cc;
		}
		.profile-work{
			padding: 14%;
			margin-top: -15%;
		}
		.profile-work p{
			font-size: 12px;
			color: #818182;
			font-weight: 600;
			margin-top: 10%;
		}
		.profile-work a{
			text-decoration: none;
			color: #495057;
			font-weight: 600;
			font-size: 14px;
		}
		.profile-work ul{
			list-style: none;
		}
		.profile-tab label{
			font-weight: 600;
		}
		.profile-tab p{
			font-weight: 600;
			color: #0062cc;
		}
	</style>
</body>
</html>