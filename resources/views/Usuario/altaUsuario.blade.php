<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="ISO-8859-1" />
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../css/conUsuario/estilos.css">
    <title>Hola Mundo!</title>
</head>

<body>

    @include('layouts.headerVisitante')
    <div class="contenedor-clase h5">
        <form action="altaUsu" method="POST">
            {{ csrf_field()}}



            <div class="row mb-3">
                <div class="col mr-5">
                    <label class="width20 margin4 marginb widthauto">Primer Nombre</label>

                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Primer Nombre" required>
                </div>
                <div class="col">
                    <label class="width20 margin4 marginb widthauto">Segundo Nombre</label>

                    <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre" required>
                </div>
            </div>

            </br>
            </br>

            <div class="row mb-3">
                <div class="col mr-5">
                    <label class="width20 margin4 marginb widthauto">Primer Apellido</label>

                    <input type="text" class="form-control" id="apellido" name="pApellido" placeholder="Primer Apellido" required>
                </div>

                <div class="col">
                    <label class="width20 margin4 marginb widthauto">Segundo Apellido</label>

                    <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" required>
                </div>
                
            </div>

            </br>
            </br>

            <div class="row mb-3">
                <div class="col mr-5">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Documento de Identidad</label>
                    <input type="text" class="form-control" name="documento" placeholder="Documento de Identidad" required>
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
                    <input type="text" class="form-control" name="passwd" placeholder="Contraseña" required>
                </div>

                <div class="col">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Confirmar Contraseña</label>
                    <input type="text" class="form-control" name="passwd2" placeholder="Confirmar Contraseña" required>
                </div>
            </div>
            </br>
            </br>

            <div class="row mb-3">
                <div class="col mr-5">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
                </div>

                
                <div class="col">

                <div class="row">
                <div class="col">
                    <label for="validationDefaultUsername" class="width20 margin4 marginb widthauto">Departamento</label>
                    </br>
                    <select class="custom-select form-select-sm" id="shrekislife" name="departamento" onchange="listarLocalidades()">
                        <option selected>Departamento</option>
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
                    <select class="custom-select form-select-sm" name="localidad" id="shrekisstrong">
                        <option selected>Localidad</option>

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
            <button class="btn btn-primary" id="validate" type="submit">Registrarme</button>
        </form>



    </div>
    <script>
        function validateEmail(email) {
            const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
            console.log(re.test(email));
            return re.test(email);
        }


        function validate() {
            const $result = $("#result");
            const email = $("#email").val();
            const nombre = $("#nombre").val();
            const apellido = $("#apellido").val();

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

        $("#validate").on("click", validate);

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
    </script>

</body>

</html>