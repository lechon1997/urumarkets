<!DOCTYPE html>
<html>
<head>
  @include('layouts.headerVisitante')
  <title>Alta Empresa</title>
</head>
<body>
  <form style="width: 500px;margin-left: auto;
  margin-right: auto;margin-top: 50px; margin-bottom: 50px;">

    <div class="form-group">
      <label for="exampleFormControlInput1">Nombre</label>
      <input type="text" class="form-control" id="Nombre" placeholder="Nombre">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Apellido</label>
      <input type="text" class="form-control" id="Apellido" placeholder="Apellido">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="pass" placeholder="Contraseña">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Confirmar contraseña</label>
      <input type="password" class="form-control" id="confirmpass" placeholder="Contraseña">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo de Documento</label>
      <select class="form-control" id="TipoDoc">
        <option>CI</option>
        <option>RUT</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nombre Tienda</label>
      <input type="text" class="form-control" id="nombretienda" placeholder="nombre de la tienda">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo Organizacion</label>
      <select class="form-control" id="tipoOrg">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Rubro</label>
      <input type="text" class="form-control" id="rubro" placeholder="rubro">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Telefono</label>
      <input type="text" class="form-control" id="Telefono" placeholder="Telefono">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Telefono 2</label>
      <input type="text" class="form-control" id="Telefono 2" placeholder="Telefono 2">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Celular</label>
      <input type="text" class="form-control" id="Celular" placeholder="Celular">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Celular 2</label>
      <input type="text" class="form-control" id="Celular 2" placeholder="Celular ">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Segundo Nombre</label>
      <input type="text" class="form-control" id="Segundo Nombre" placeholder="Segundo Nombre">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Segundo Apellido</label>
      <input type="text" class="form-control" id="Segundo Apellido" placeholder="Segundo Apellido">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Localidad</label>
      <input type="text" class="form-control" id="Localidad" placeholder="Localidad">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Calle</label>
      <input type="text" class="form-control" id="Calle" placeholder="Calle">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">NumeroEmpresa</label>
      <input type="text" class="form-control" id="NumeroEmpresa" placeholder="NumeroEmpresa">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Descripcion</label>
      <textarea class="form-control" id="Descripcion" rows="3"></textarea>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="checkbox">
      <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones.</label>
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Confirmar</button>

    <button type="submit" class="btn btn-primary">Cancelar</button>

  </form>
</body>
</html>