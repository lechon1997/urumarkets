<!DOCTYPE html>
<html>
<head>
  <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Alta Empresa</title>
</head>
@include('layouts.headerVisitante')
<body>
  <form action="ModificarEmpresa" method="POST" style="width: 500px;margin-left: auto;
  margin-right: auto;margin-top: 50px; margin-bottom: 50px;">

  {{ csrf_field()}}

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="pnombre"  value="{{ $usuario->primerNombre }}"  placeholder="Nombre">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Apellido</label>
    <input type="text" class="form-control" id="Apellido" name="papellido" placeholder="Apellido">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Segundo Nombre</label>
    <input type="text" class="form-control" id="Segundo Nombre" name="snombre" placeholder="Segundo Nombre">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Segundo Apellido</label>
    <input type="text" class="form-control" id="Segundo Apellido" name="sapellido" placeholder="Segundo Apellido">
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
    <input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $vendedor->razonSocial }}" placeholder="razon social">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre de fantasia</label>
    <input type="text" class="form-control" id="nombrefantasia" name="nombrefantasia" placeholder="Nombre de fantasia">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Rut</label>
    <input type="text" class="form-control" id="Rut" name="Rut" value="{{ $vendedor->RUT }}" placeholder="Rut">
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


  function validate() {
    const $result = $("#result");
    const email = $("#email").val();
    const nombre = $("#pnombre").val();
    const apellido = $("#papellido").val();

    $result.text("");

    if (validateEmail(email)) {
      $result.text(email + " is valid :)");
      $result.css("color", "green");
    } else {
      $result.text(email + " is not valid :(");
      $result.css('color', '#D81B60');
      return false;
    }

  }

  $("#Confirmar").on("click", validate);

  function listarLocalidades() {
    id_departamento = $("#shrekislife").val();
    $.ajax({
      url: "http://localhost/urumarkets/public/listar_localidades",
      dataType: "json",
      data: {
        id: id_departamento
      },
      method: "GET",
      success: function(res){
        console.log(res);

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
                .append('<option selected="selected">Seleccion su Localidad</option>');
        }
  $("#shrekislife").on("click", listarLocalidades);
</script>
</body>
</html>