<!DOCTYPE html>
<html>
<head>
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Alta Empresa</title>
</head>

<body>
  <form action="ModificarEmpresa" method="POST" enctype="multipart/form-data" style="margin-bottom: 50px;">
    {{ csrf_field()}}
    <div class="container" style="width: 600px;">
      <h2>Modificar datos de Empresa</h2>
      <!--<p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>-->

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Usuario</a></li>
        <li><a href="#menu1" data-toggle="tab">Empresa</a></li>
        <li><a href="#menu2" data-toggle="tab">Foto de perfil</a></li>
        <li><a href="#menu3" data-toggle="tab">Descripcion</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <br>
          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Nombre</label>
            <input type="text" class="form-control" id="pnombre" name="pnombre" placeholder="Nombre" value="{{ $usuario->primerNombre }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Apellido</label>
            <input type="text" class="form-control" id="papellido" name="papellido" placeholder="Apellido" value="{{ $usuario->primerApellido }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Segundo Nombre</label>
            <input type="text" class="form-control" id="snombre" name="snombre" placeholder="Segundo Nombre" value="{{ $usuario->segundoNombre }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Segundo Apellido</label>
            <input type="text" class="form-control" id="sapellido" name="sapellido" placeholder="Segundo Apellido" value="{{ $usuario->segundoApellido }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Cedula</label>
            <input type="text" class="form-control" id="Cedula" name="cedula" placeholder="Cedula" value="{{ $usuario->cedula }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ $usuario->email }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="{{ $usuario->telefono }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" value="{{ $usuario->contrasenia }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleInputPassword1">Confirmar contraseña</label>
            <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Contraseña">
          </div>

          <button type="button" id="siguiente1" class="btn btn-info" style="float: right;">Siguiente</button>
        </div>
        <div id="menu1" class="tab-pane fade">
          <br>
          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Razon social</label>
            <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="razon social" value="{{ $vendedor->razonSocial }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Nombre de fantasia</label>
            <input type="text" class="form-control" id="nombrefantasia" name="nombrefantasia" placeholder="Nombre de fantasia" value="{{ $vendedor->nombreFantasia }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Rut</label>
            <input type="text" class="form-control" id="Rut" name="Rut" placeholder="Rut" value="{{ $vendedor->RUT }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlSelect1">Tipo Organizacion</label>
            <select class="form-control" id="tipoOrg" name="tipoOrg">
              <option>ONG</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Rubro</label>
            <input type="text" class="form-control" id="rubro" name="rubro" placeholder="rubro" value="{{ $vendedor->rubro }}">
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Telefono de la Empresa</label>
            <input type="text" class="form-control" id="telefonoEmpresa" name="telefonoEmpresa" placeholder="Telefono Empresa"  value="{{ $vendedor->telefonoEmpresa }}">
          </div>
          <button type="button" id="siguiente2" class="btn btn-info" style="float: right;">Siguiente</button>
        </div>
        <div id="menu2" class="tab-pane fade">
          <br>
          <div class="z-depth-1-half mb-4">
            <img src="storage/empresa/{{ $usuario->imagen }}" class="img-fluid"
            alt="example placeholder" id="fotoperfil">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="file" id="file" onchange="preview_image(event)">
            <label class="custom-file-label" for="customFileLangHTML" for="file" data-browse="Examinar"></label>
          </div>
          <br>
          <br>
          <button type="button" id="siguiente3" class="btn btn-info" style="float: right;">Siguiente</button>
        </div>
        <div id="menu3" class="tab-pane fade">
          <br>
          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlSelect1">Departamento</label>
            <select class="form-control" id="shrekislife" name="Departamento">
              <option selected>Seleccione su Departamento</option>
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
            <label style="font-weight: normal;" for="exampleFormControlSelect1">Localidad</label>
            <select class="form-control" name="localidad" id="shrekisstrong">
              <option selected>Localidad</option>
            </select>
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlInput1">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="{{ $vendedor->direccion }}" >
          </div>

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3">{{ $vendedor->descripcion }}</textarea>
          </div>

          <br>
          <button type="submit" class="btn btn-success"  style="float: right;" id="Finalizar" name="Finalizar">Finalizar</button>
        </div>
      </div>
    </div>

  </form>

  <script type="text/javascript">
    function validateEmail(email) {
      const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
      console.log(re.test(email));
      return re.test(email);
    }

    function preview_image(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('fotoperfil');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
    
    $('#Finalizar').on('click', function() {

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

      var e = document.getElementById("shrekislife");
      var localidad = e.options[e.selectedIndex].text;

      var d = document.getElementById("shrekisstrong");
      var Departamento = d.options[d.selectedIndex].text;

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
      }else if(localidad == "Seleccione su Departamento"){
        alert("No selecciono su departamento.");
        return false;
      }else if(Departamento == "localidad" || Departamento == "Seleccione su Localidad"){
        alert("No selecciono su localidad.");
        return false;
      }});

    $('#siguiente1').on('click', function() {
    //$('#home').hide();
    activaTab('menu1');
  });

    $('#siguiente2').on('click', function() {
      activaTab('menu2');
    });

    $('#siguiente3').on('click', function() {
      activaTab('menu3');
    });

    function activaTab(tab){
      $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    };

//para las localidades-----------------------------------
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
  .append('<option value="0" selected="selected" require >Seleccione su Localidad</option>')
}

$("#shrekislife").on("click", listarLocalidades);

</script>
</body>
</html>