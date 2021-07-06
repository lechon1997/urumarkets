<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>MercadoPago</title>
</head>

<body>
   @include('layouts.headerVisitante')   
   <!-- Step #2 -->
   <div class="contenedor">
      @csrf
      <label>Numero de tarjeta: </label>
      <input type="text" value = "5031755734530604" class="form-control"  id="nrotarjeta" />
      <label>Mes de expiracipón: </label>
      <input type="text" value ="11" class="form-control"  id="mesexpiracion" />
      <label>Año de expiración: </label>
      <input type="text" value = "25" class="form-control"  id="anoexpiracion" />
      <label>Nombre y apellido: </label>
      <input type="text" value = "{{$usuario->primerNombre}} {{$usuario->primerApellido}}" class="form-control"  id="nombre"/>
      <label>Email: </label>
      <input type="email" value = "{{$usuario->email}}" class="form-control" id="mailusu"/>
      <label>Codigo de seguridad: </label>
      <input type="text" class="form-control" value = "123" id="codigoseg" />
      <label>Tipo de tarjeta: </label>
      <select  class="custom-select" id="bancoemisor">
            <option>MasterCard</option>
            <option>Visa</option>
      </select>
      <label>Tipo de documento: </label>
      <select  class="custom-select" id="tipodocumento">
        <option selected="">CI</option>
        <option>Otro</option>
      </select>
      <label>Cedula: </label>
      <input type="text" value = "{{$usuario->cedula}}" class="form-control" id="indentificacion"/>
      <br>
      <div class="d-flex" style="width: 400px;">
      <button type="submit" class="btn btn-success" id="pagar">Pagar</button>
      </div>
      <br>
      <p><b>Estado: </b><span id="estado-pago"></span></p>
      <p><b>Detalle: </b><span id="detalle-pago"></span></p>
      
      <input type="hidden" name="total" id="total" value = "{{$total}}" />   
  </div>
  <br>
    <img src="http://localhost/urumarkets/imagenes/tarjetacred.png">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compra realizada.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="" class="h5" style="color: green;">
            Su compra se realizo correctamente. ¡Que la disfrute!
        </p>
      </div>
    </div>
  </div>
</div>

  <style type="text/css">
.contenedor{
  position: relative;
  float: left;
  margin-top: 2%;
  margin-right: 8%;
  margin-left: 20%;
  margin-bottom: 2%;  
  width: 15%;
  /*bordes*/
  border: 1px solid #000000;
  -moz-border-radius: 7px;
  -webkit-border-radius: 7px;
  padding: 10px;
}

  </style>

<script type="text/javascript">
       var total = document.getElementById('total').value;

$('#pagar').on('click', function() {
    $.ajax({
      url: "http://localhost/urumarkets/public/finalizarcompra2",
      headers: {
                  "Content-Type": "application/json",                  
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      data: {
          total: total
      },
      method: "POST",
      success: function(res) {
        if(res.status === "approved" && res.status_detail === "accredited"){
          document.getElementById("estado-pago").innerText = "aprobado";
          document.getElementById("detalle-pago").innerText = "acreditado";
          document.getElementById("pagar").disabled = true;
          $('#exampleModal').modal('show');
          setTimeout( function() {$('#exampleModal').modal('hide');}, 2500);
          setTimeout( function() {window.location.href = "http://localhost/urumarkets/public/index";}, 3500);
        }else{
          document.getElementById("estado-pago").innerText = "error";
          document.getElementById("detalle-pago").innerText = "error"
        }
      }
    });
});

   </script>
</body>



</html>

