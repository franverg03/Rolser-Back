<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="/styles/administrativo.css">
    <link rel="stylesheet" href="/styles/clientesComercial.css">
    <title>Home Comercial Rolser</title>
</head>

<body class="contenedor">
    @include('comercial.comercial-menu')

    {{-- Contenedor principal --}}
    <div class="contenedor-principal-comercial w-full">

        {{-- Breadcrumb contenedor --}}
        <div class="contenedor-breadcrump-comercial">
            <div class="maquetacion-breadcrump-comercial flex flex-row">
                <a class="estilo-breadcrump-comercial" href="{{route('comercial.objetivos')}}">Home > Objetivos</a>
            </div>
        </div>

        <div>
            <div class="flex"></div>
            <div id="datatable" class="flex justify-start ml-32">
                @livewire('tabla-objetivos')
            </div>
        </div>

    </div>

    <script src="/js/script.js"></script>
</body>

</html>
