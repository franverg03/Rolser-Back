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
                <a class="estilo-breadcrump-comercial" href="{{ route('comercial.home') }}">Home</a>
            </div>
        </div>

        <div class="flex justify-center ml-96">
            <button type="button" class="botonEliminar">
                <a href="{{ route('comercial.objetivos') }}">Ver Objetivos</a>
            </button>
        </div>



        {{-- Contenedor de la gráfica --}}
        <div class="flex flex-col items-start justify-center ml-10 mt-5 px-8">
            <div class="w-full max-w-3xl">
                @livewire('grafica-clientes')
            </div>
        </div>

        <div class="flex flex-col items-start justify-center ml-10 px-8">
            <div class="w-full max-w-3xl">
                @livewire('grafica-pedidos')
            </div>
        </div>



    </div>

    <script src="/js/script.js"></script>
</body>

</html>
