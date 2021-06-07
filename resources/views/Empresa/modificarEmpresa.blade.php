<!DOCTYPE html>
<html>
<head>
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar mi Empresa</title>
</head>
@include('layouts.headerVisitante')
<body>
  <br>
  <form action="ModificarEmpresa" method="POST" enctype="multipart/form-data" style="margin-bottom: 50px;">
    {{ csrf_field()}}
    <div class="container" style="width: 600px;">
      <h2>Modificar datos de Empresa</h2>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-Usuario-tab" data-toggle="tab" href="#nav-Usuario" role="tab" aria-controls="nav-Usuario" aria-selected="true">Usuario</a>
          <a class="nav-item nav-link" id="nav-Empresa-tab" data-toggle="tab" href="#nav-Empresa" role="tab" aria-controls="nav-Empresa" aria-selected="false">Empresa</a>
          <a class="nav-item nav-link" id="nav-Fotodeperfil-tab" data-toggle="tab" href="#nav-Fotodeperfil" role="tab" aria-controls="nav-Fotodeperfil" aria-selected="false">Foto de perfil</a>
          <a class="nav-item nav-link" id="nav-Direccion-tab" data-toggle="tab" href="#nav-Direccion" role="tab" aria-controls="nav-Direccion" aria-selected="false">Direccion</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-Usuario" role="tabpanel" aria-labelledby="nav-Usuario-tab">
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
        <div class="tab-pane fade" id="nav-Empresa" role="tabpanel" aria-labelledby="nav-Empresa-tab">
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

          <div class="form-group">
            <label style="font-weight: normal;" for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3">{{ $vendedor->descripcion }}</textarea>
          </div>

          <button type="button" id="siguiente2" class="btn btn-info" style="float: right;">Siguiente</button>
        </div>
        <div class="tab-pane fade" id="nav-Fotodeperfil" role="tabpanel" aria-labelledby="nav-Fotodeperfil-tab">
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
        <div class="tab-pane fade" id="nav-Direccion" role="tabpanel" aria-labelledby="nav-Direccion-tab">
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
            <input type="text" style="display: inline-block;width: 73%;" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="{{ $vendedor->direccion }}" >
            <button type="button" class="btn btn-info" style="padding :0.200rem 0.75rem" id="Localizar" name="Localizar">Localizar</button>
          </div>

          <div id="map">
          </div>

          <br>
          <button type="submit" class="btn btn-success"  style="float: right;" id="Finalizar" name="Finalizar">Finalizar</button>
        </div>
      </div>
    </div>
  </form>
  <br>

  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd3tMhoqH5_greqnS-dUCBwPFDe1h0eJI&callback=iniciarMap"></script>
  <script type="text/javascript">
    var geocoder;
    var map;
    let markers = [];
    var deptoseleccionado;
    var localidadseleccionada;

    function iniciarMap(){
      geocoder = new google.maps.Geocoder();
      var coord = {lat:-34.904569 ,lng: -56.159872};
      map = new google.maps.Map(document.getElementById('map'),{
        zoom: 10,
        center: coord
      });
      var marker = new google.maps.Marker({
        position: coord,
        map: map
      });
      markers.push(marker);
    }

    $('#shrekislife').on('change', function() {
      clearMarkers();
      var address = document.getElementById('shrekislife');
      var dep = address.options[address.selectedIndex].text+ " " + "Uruguay";
      console.log(dep);
      deptoseleccionado = dep;
      geocoder.geocode( { 'address': dep}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
          });
          map.setZoom(10);
          markers.push(marker);
        } else {
          alert('Localizacion no encontrada: ' + status);
        }
      });
    });

    $('#shrekisstrong').on('change', function() {
      clearMarkers();
      var address = document.getElementById('shrekisstrong');
      var loc = address.options[address.selectedIndex].text + " " + deptoseleccionado;
      console.log(loc);
      localidadseleccionada = loc;
      geocoder.geocode( { 'address': loc}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
          });
          map.setZoom(12);
          markers.push(marker);
        } else {
          alert('Localizacion no encontrada: ' + status);
        }
      });
    });

    $('#Localizar').on('click', function() {
      var address = document.getElementById('direccion').value;
      if(address==""){
        alert("no ingreso ninguna direccion");
      }else{
        clearMarkers();      
        var dir = address + " " + localidadseleccionada;
        console.log(dir);

        geocoder.geocode( { 'address': dir}, function(results, status) {
          if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
            map.setZoom(16);
            markers.push(marker);
          } else {
            alert('Localizacion no encontrada: ' + status);
          }
        });
      }      
    });

  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setMapOnAll(null);
  }

  // Shows any markers currently in the array.
  function showMarkers() {
    setMapOnAll(map);
  }

  // Deletes all markers in the array by removing references to them.
  function deleteMarkers() {
    clearMarkers();
    markers = [];
  }

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
    activaTab('nav-Empresa');
  });

  $('#siguiente2').on('click', function() {
    activaTab('nav-Fotodeperfil');
  });

  $('#siguiente3').on('click', function() {
    activaTab('nav-Direccion');
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
<style type="text/css">
  #map {
    height: 500px;
    width: 100%;
  }
</style>
</html>