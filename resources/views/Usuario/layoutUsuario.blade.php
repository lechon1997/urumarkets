<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1" />
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../css/conUsuario/estilos.css">
    <title>Usuario</title>
</head>

<body>
    @include('layouts.headerVisitante')
    <div class="contenedor-clase h5">
        @yield('formulario')

    </div>
    <script>
        function validateEmail(email) {
            const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
            console.log(re.test(email));
            return re.test(email);
        }

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

        $('#validate').on('click', function() {
            const nombre = $('#nombre');
            const nombre2 = $('#nombre2');
            const apellido = $('#apellido');
            const apellido2 = $('#apellido2');
            const correo = $('#email');
            const documento = $('#documento');
            const telefono = $('#telefono');
            const pass = $('#pass');
            const pass2 = $('#pass2');
            const depa = $('#shrekislife');
            const loca = $('#shrekisstrong');
            const $result = $("#result");
            let hayDatos = false;
            let datosValidos = false;
            $result.css('color', '#D81B60');


            if (nombre.val().length == 0)
                $result.text("El campo Primer Nombre es obligatorio.");
            else if (apellido.val().length == 0)
                $result.text("El campo Primer Apellido es obligatorio.");
            else if (correo.val().length == 0)
                $result.text("El campo Correo Electrónico es obligatorio.");
            else if (documento.val().length == 0)
                $result.text("El campo Primer Apellido es obligatorio.");
            else if (pass.val().length == 0)
                $result.text("El campo Contraseña es obligatorio.");
            else if (pass2.val().length == 0)
                $result.text("Confirme su Contraseña por favor.");
            else if (telefono.val().length == 0)
                $result.text("El campo Telefono es obligatorio.");
            else if (depa.val() == 0)
                $result.text("El campo Departamento es obligatorio.");
            else if (loca.val() == 0)
                $result.text("El campo Localidad es obligatorio.");
            else
                hayDatos = true;

            if (!hayDatos)
                return false;

            if (!/^[a-zA-Z]+$/.test(nombre.val()))
                $result.text("El Primer Nombre debe estar compuesto solo de letras y sin espacios.");
            else if (nombre2.val() != 0 && !/^[a-zA-Z]+$/.test(nombre2.val()))
                $result.text("El Segundo Nombre debe estar compuesto solo de letras y sin espacios.");
            else if (!/^[a-zA-Z]+$/.test(apellido.val()))
                $result.text("El Primer Apellido debe estar compuesto solo de letras y sin espacios.");
            else if (apellido2.val() != 0 && !/^[a-zA-Z]+$/.test(apellido2.val()))
                $result.text("El Segundo Apellido debe estar compuesto solo de letras y sin espacios.");
            else if (!/^\d+$/.test(documento.val()))
                $result.text("El Documento de Identidad debe estar compuesto solo por números.")
            else if (!validateEmail(correo.val()))
                $result.text("El Correo Electrónico no es valido.")
            else if (pass.val() != pass2.val())
                $result.text("Las contraseñas no coinciden.")
            else if (!/^\d+$/.test(documento.val()))
                $result.text("El Telefono debe estar compuesto solo por números.")
            else
                datosValidos = true;

            if (!datosValidos)
                return false;

            return true;
        });
    </script>

</body>

</html>