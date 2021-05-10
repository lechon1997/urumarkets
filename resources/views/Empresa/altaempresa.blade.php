<!DOCTYPE html>
<html>
<head>
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Alta Empresa</title>
</head>
@include('layouts.headerVisitante')
<body>
  <form action="altaVendedor" method="POST" style="width: 500px;margin-left: auto;
  margin-right: auto;margin-top: 50px; margin-bottom: 50px;">

  {{ csrf_field()}}

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="pnombre" name="pnombre" placeholder="Nombre">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Apellido</label>
    <input type="text" class="form-control" id="papellido" name="papellido" placeholder="Apellido">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Segundo Nombre</label>
    <input type="text" class="form-control" id="snombre" name="snombre" placeholder="Segundo Nombre">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Segundo Apellido</label>
    <input type="text" class="form-control" id="sapellido" name="sapellido" placeholder="Segundo Apellido">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Cedula</label>
    <input type="text" class="form-control" id="Cedula" name="cedula" placeholder="Cedula">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirmar contraseña</label>
    <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Contraseña">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Razon social</label>
    <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="razon social">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre de fantasia</label>
    <input type="text" class="form-control" id="nombrefantasia" name="nombrefantasia" placeholder="Nombre de fantasia">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Rut</label>
    <input type="text" class="form-control" id="Rut" name="Rut" placeholder="Rut">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Tipo Organizacion</label>
    <select class="form-control" id="tipoOrg" name="tipoOrg">
      <option>ONG</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Rubro</label>
    <input type="text" class="form-control" id="rubro" name="rubro" placeholder="rubro">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono de la Empresa</label>
    <input type="text" class="form-control" id="telefonoEmpresa" name="telefonoEmpresa" placeholder="Telefono Empresa">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Departamento</label>
    <select class="form-control" id="shrekislife" name="Departamento">
      <option selected>Seleccion su Departamento</option>
      <option value="1">Paysandú</option>
      <option value="2">Montevideo</option>
      <option value="3">Artigas</option>
      <option value="4">Canelones</option>
      <option value="5">Tacuarembó</option>
      <option value="6">Cerro Largo</option>
      <option value="7">Colonia</option>
      <option value="8">Durazno</option>
      <option value="9">Flores</option>
      <option value="10">Florida</option>
      <option value="11">Lavalleja</option>
      <option value="12">Maldonado</option>
      <option value="13">Rio Negro</option>
      <option value="14">Rivera</option>
      <option value="15">Rocha</option>
      <option value="16">Salto</option>
      <option value="17">San José</option>
      <option value="18">Soriano</option>
      <option value="19">Treinta y Tres</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Localidad</label>
    <select class="custom-select form-select-sm" name="localidad" id="shrekisstrong">
      <option selected>Localidad</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripcion</label>
    <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3"></textarea>
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
    <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones.</label>
  </div>
  <br>

  <button type="submit" class="btn btn-primary" id="Confirmar" name="Confirmar">Confirmar</button>

  <button type="submit" class="btn btn-primary" name="Cancelar">Cancelar</button>
</form>

<script type="text/javascript">
  function validateEmail(email) {
    const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
    console.log(re.test(email));
    return re.test(email);
  }

  $('#Confirmar').on('click', function() {

    var pnombre = $("#pnombre").val();
    var papellido = $("#papellido").val();
    var snombre = $("#snombre").val();
    var sapellido = $("#sapellido").val();
    var Cedula = $("#Cedula").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var pass = $("#pass").val();
    var confirmpass = $("#confirmpass").val();
    var razonsocial = $("#razonsocial").val();
    var nombrefantasia = $("#nombrefantasia").val();
    var Rut = $("#Rut").val();
    var telefonoEmpresa = $("#telefonoEmpresa").val();
    var rubro = $("#rubro").val();
    var direccion = $("#direccion").val();
    var Descripcion = $("#Descripcion").val();
    var localidad = $("#localidad").val();
    var Departamento = $("#Departamento").val();

    if(!validateEmail(email)){
      alert("Email invalido.");
      return false;
    }

    if(pass!=confirmpass){
      alert("No coincide la contraseña con la confirmacion de la misma.");
      return false;
    }

    if(pnombre == ""){
      alert("Debe ingresar su primer nombre.");
      return false;
    }else if(papellido == ""){
      alert("Debe ingresar su primer apellido.");
      return false;
    }else if(sapellido == ""){
      alert("Debe ingresar su segundo apellido.");
      return false;
    }else if(Cedula == ""){
      alert("Debe ingresar su cedula.");
      return false;
    }else if(email == ""){
      alert("Debe ingresar su email.");
      return false;
    }else if(pass == ""){
      alert("Debe ingresar una contraseña.");
      return false;
    }else if(confirmpass == ""){
      alert("Debe confimar su contraseña.");
      return false;
    }else if(razonsocial == ""){
      alert("Debe ingresar la razon social de su empresa.");
      return false;
    }else if(nombrefantasia == ""){
      alert("Debe ingresar el nombre de fantasia de su empresa.");
      return false;
    }else if(Rut == ""){
      alert("Debe ingresar el rut de su empresa.");
      return false;
    }else if(telefonoEmpresa == ""){
      alert("Debe ingresar el telefono de su empresa.");
      return false;
    }else if(direccion == ""){
      alert("Debe ingresar la direccion de su empresa.");
      return false;
    }else if(localidad == ""){
      alert("Debe ingresar la Localidad donde esta su empresa.");
      return false;
    }else if(Departamento == ""){
      alert("Debe ingresar el Departamento donde esta su empresa.");
      return false;
    }});

  function listarLocalidades() {
    id_departamento = $("#shrekislife").val();
    $.ajax({
      url: "http://localhost/urumarkets/public/listar_localidades",
      dataType: "json",
      data: {
        id: id_departamento
      },
      method: "GET",
      success: function(res) {

        var elemento,
        cant = Object.keys(res).length;
        limpiar_select_localidades();
        for (var i = 0; i < cant; i++)
          $("#shrekisstrong").append(new Option(res[i].nombre, res[i].id));
      }
    });
  }

  function limpiar_select_localidades() {
    $('#shrekisstrong')
    .empty()
    .append('<option value="0" selected="selected" require >Seleccion su Localidad</option>')
  }

  $("#shrekislife").on("click", listarLocalidades);

</script>
</body>
</html>