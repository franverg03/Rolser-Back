<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    <link rel="stylesheet" href="/styles/administrativo.css">

    <title>HomeAdministrativoRolser</title>
</head>

<body class="contenedor">
    @include('administrativo.administrativo-menu')
    {{-- Contenedor principal --}}
    <div class="contenedor-principal-administrativo">
        {{-- Breadcrumb contenedor --}}
        <div class="contenedor-breadcrump-administrativo">
            <div class="maquetacion-breadcrump-administrativo">
                <a class="estilo-breadcrump-administrativo" href="/homeAdministrativo">Home</a>
            </div>
        </div>
        <div>

        </div>
    </div>
    <script src="/js/script.js"></script>
</body>
</html>
