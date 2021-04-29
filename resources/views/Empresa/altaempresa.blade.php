<!DOCTYPE html>
<html>
<head>
  @include('layouts.headerVisitante')
  <title>Alta Empresa</title>
</head>
<body>
  <form action="altaEmp" method="POST" style="width: 500px;margin-left: auto;
  margin-right: auto;margin-top: 50px; margin-bottom: 50px;">

  {{ csrf_field()}}

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="pnombre" placeholder="Nombre">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Apellido</label>
    <input type="text" class="form-control" id="Apellido" name="papellido" placeholder="Apellido">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
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
    <label for="exampleFormControlSelect1">Tipo de Documento</label>
    <select class="form-control" id="TipoDoc" name="TipoDoc">
      <option>CI</option>
      <option>RUT</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Documento/Rut</label>
    <input type="text" class="form-control" id="Rut" name="Rut" placeholder="nombre de la tienda">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Tienda</label>
    <input type="text" class="form-control" id="nombretienda" name="nombretienda" placeholder="nombre de la tienda">
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
    <label for="exampleFormControlInput1">Telefono</label>
    <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono 2</label>
    <input type="text" class="form-control" id="Telefono 2" name="Telefono 2" placeholder="Telefono 2">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Celular</label>
    <input type="text" class="form-control" id="Celular" name="Celular" placeholder="Celular">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Celular 2</label>
    <input type="text" class="form-control" id="Celular 2" name="Celular 2" placeholder="Celular ">
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
    <label for="exampleFormControlSelect1">Departamento</label>
    <select class="form-control" id="Departamento" name="Departamento">
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
    <input type="text" class="form-control" id="Localidad" name="Localidad" placeholder="Localidad">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Calle</label>
    <input type="text" class="form-control" id="Calle" name="Calle" placeholder="Calle">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Numero Local</label>
    <input type="text" class="form-control" id="NumeroEmpresa" name="NumeroEmpresa" placeholder="Numero Local">
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

  <button type="submit" class="btn btn-primary" name="Confirmar">Confirmar</button>

  <button type="submit" class="btn btn-primary" name="Cancelar">Cancelar</button>
</form>
</body>
</html>