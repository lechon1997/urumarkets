@extends('Usuario.layoutUsuario')
@section('formulario')

<form action="modificarUsu" method="POST">
    {{ csrf_field()}}

    <div class="row mb-3">
        <div class="col mr-5">
            <label class="width20 margin4 marginb widthauto">Primer Nombre</label>

            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Primer Nombre" value="{{ $usuario->primerNombre }}" required>
        </div>
        <div class="col">
            <label class="width20 margin4 marginb widthauto">Segundo Nombre</label>

            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre" value="{{ $usuario->segundoNombre }}" required>
        </div>
    </div>

    </br>
    </br>

    <div class="row mb-3">
        <div class="col mr-5">
            <label class="width20 margin4 marginb widthauto">Primer Apellido</label>

            <input type="text" class="form-control" id="apellido" name="pApellido" placeholder="Primer Apellido" value="{{ $usuario->primerApellido }}" required>
        </div>

        <div class="col">
            <label class="width20 margin4 marginb widthauto">Segundo Apellido</label>

            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" value="{{ $usuario->segundoApellido }}" required>
        </div>

    </div>

    </br>
    </br>

    <div class="row mb-3">
        <div class="col mr-5">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Documento de Identidad</label>
            <input type="text" class="form-control" name="documento" placeholder="Documento de Identidad" value="{{ $usuario->cedula }}" required>
        </div>

        <div class="col">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Correo Electrónico</label>
            <input type="email" id="email" class="form-control" name="correoE" placeholder="Correo Electrónico" value="{{ $usuario->email }}" required>
        </div>

    </div>

    </br>
    </br>
    <div class="row mb-3">
        <div class="col mr-5">
            <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="{{ $usuario->telefono }}" required>
        </div>


        <div class="col">

            <div class="row">
                <div class="col">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Departamento</label>
                    </br>
                    <select class="custom-select form-select-sm" id="shrekislife" name="departamento" onchange="listarLocalidades()">
                        <option selected value="{{ $departamentoUsu->id }}">{{ $departamentoUsu->nombre }}</option>
                        
                        @foreach ( $departamentos as $depa)
                        <option value=" {{ $depa->id }} ">{{ $depa->nombre }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-6">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Localidad</label>
                    </br>
                    <select class="custom-select form-select-sm" name="localidad" id="shrekisstrong">
                        <option selected value=" {{ $localidadUsu->id }} ">{{ $localidadUsu->nombre }}</option>

                        @foreach ( $localidades as $localidad)
                        <option value=" {{ $localidad->id }} ">{{ $localidad->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

        </div>
    </div>

    </br>

    </br>
    </br>

    <h2 id='result' class="h5 Danger link"></h2>
    </br>
    </br>

    <button class="btn btn-primary" id="validate" type="submit">Confirmar</button>
</form>
@endsection