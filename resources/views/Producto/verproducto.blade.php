<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>Ver Producto</title>
</head>
<body>
@include('layouts.headerVisitante')
    <div class="bg-white w-75 container d-flex mt-3 rounded border p-0" style="height:500px ;" >
        <div style="width:40%;height:60%;"></div>
        <div class="" style="width:60%;height:100%;">
            <div class="container border-left h-100 p-3">
                <div style="height: 40%;">
                    <p class="h4">Tablet Android 10.0, tabletas Facetel Q3 Pro de 10 pulgadas.</p>
                    <a class="d-block mt-3" href="#">Visitar la tienda de ElecreoXd</a>
                    <p class="d-block mt-3 h4" style="color: #343a40;">Precio: $500</p>
                    <p class="d-block mt-3 h4" style="color: #343a40;">Stock: 251 unidades</p>  
                </div>

                <div class="d-flex justify-content-center" style="height: 45%;">
                    <p class="d-block mt-3 h3 "style="color: #343a40;" >Descripción</p>    
                </div>
                <div class="d-flex align-items-center"  >
                <button type="button"  value="{{$id }}"  class="m-3 w-50 btn btn-success">Agregar al carrito  </button>
                <div class="w-50 pl-2 d-flex align-items-center">
                    <p class="h5 mt-2">Cantidad</p>
                    <input class="w-25 ml-3 form-control" type="number" min="0" value="1">
                </div>    
            </div>
                
                
            </div>


            
        </div>
    </div>
</body>
</html>