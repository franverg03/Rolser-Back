<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/styles/homeComercial.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>HomeComercialRolser</title>
</head>

<body class="contenedor">
    @include('comercial.comercial-menu')
    {{-- Contenedor principal --}}
    <div class="contenedor-principal-comercial">
        {{-- Breadcrumb contenedor --}}
        <div class="contenedor-breadcrump-comercial">
            <div class="maquetacion-breadcrump-comercial flex flex-row">
                <a class="estilo-breadcrump-comercial" href="{{route('comercial.home')}}">Home</a>
            </div>
        </div>
        {{-- Contenedor crud datatable paginacion --}}
        <div>

        </div>
    </div>
    <script src="/js/script.js"></script>
</body>

</html>
