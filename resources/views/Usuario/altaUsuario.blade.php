@extends('Usuario.layoutUsuario')
@section('formulario')
<form action="altaUsu" method="POST">
    {{ csrf_field()}}

    <div class="row mb-3">
        <div class="col mr-5">
            <label class="width20 margin4 marginb widthauto">Primer Nombre</label>

            <input type="text" class="form-control" onkeypress="return validarletras(event)" id="nombre" name="nombre" placeholder="Primer Nombre" required>
        </div>
        <div class="col">
            <label class="width20 margin4 marginb widthauto">Segundo Nombre</label>

            <input type="text" class="form-control" onkeypress="return validarletras(event)" id="nombre2" name="nombre2" placeholder="Segundo Nombre (Opcional)">
        </div>
    </div>

    </br>
    </br>

    <div class="row mb-3">
        <div class="col mr-5">
            <label class="width20 margin4 marginb widthauto">Primer Apellido</label>

            <input type="text" class="form-control" onkeypress="return validarletras(event)" id="apellido" name="pApellido" placeholder="Primer Apellido" required>
        </div>

        <div class="col">
            <label class="width20 margin4 marginb widthauto">Segundo Apellido</label>

            <input type="text" class="form-control" onkeypress="return validarletras(event)" id="apellido2" name="apellido2" placeholder="Segundo Apellido (Opcional)">
        </div>

    </div>

    </br>
    </br>

    <div class="row mb-3">
        <div class="col mr-5">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Documento de Identidad</label>
            <input onkeypress="return event.charCode >= 48" type="number" min="1" class="form-control" id="documento" name="documento" placeholder="Documento de Identidad (Sin puntos y guiones)" required>
        </div>

        <div class="col">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Correo Electrónico</label>
            <input type="email" id="email" class="form-control" name="correoE" placeholder="Correo Electrónico" required>
        </div>

    </div>

    </br>
    </br>
    <div class="row mb-3">
        <div class="col mr-5">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="passwd" placeholder="Contraseña" required>
        </div>

        <div class="col">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="pass2" name="passwd2" placeholder="Confirmar Contraseña" required>
        </div>
    </div>
    </br>
    </br>

    <div class="row mb-3">
        <div class="col mr-5">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Telefono</label>
            <input onkeypress="return event.charCode >= 48" type="number" min="1" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
        </div>
    
    <div class="col">

        <div class="row">
            <div class="col">
                <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Departamento</label>
                </br>
                <select class="custom-select form-select-sm" id="shrekislife" name="departamento" onchange="listarLocalidades()" require>
                    <option value="0" selected>Departamento</option>
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

            <div class="col-6">
                <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Localidad</label>
                </br>
                <select class="custom-select form-select-sm" name="localidad" id="shrekisstrong" require>
                    <option value="0" selected>Localidad</option>

                </select>
            </div>
        </div>

    </div>
    </div>

    </br>
    <h2 id='result' class="h5 Danger link"></h2>
    </br>
    <button class="btn btn-primary" id="validate" type="submit">Confirmar</button>
    </br>
    </br>
    </br>
</form>
<script type="text/javascript">
  function validarletras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
  }
</script>
@endsection