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

    <title>ClientesAdministrativoRolser</title>
</head>

<body class="contenedor">
    @include('administrativo.administrativo-menu')
    <div class="contenedor-principal-administrativo">
        <div class="contenedor-breadcrump-administrativo">
            <div class="maquetacion-breadcrump-administrativo flex flex-row">
                <a class="estilo-breadcrump-administrativo" href="{{ route('administrativo.home') }}">Home</a>
                <svg class="mt-0.5 ml-1 mr-1" width="20" height="20" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.56836 12.4508L9.64336 8.37578C10.1246 7.89453 10.1246 7.10703 9.64336 6.62578L5.56836 2.55078"
                        stroke="#90242A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <a class="estilo-breadcrump-administrativo"
                    href="{{ route('administrativo.clientes') }}">Clientes</a>
            </div>
        </div>
        {{-- Contenedor crud datatable paginacion --}}
        <div class="flex flex-col justify-center">
            {{-- Navegación entre datatables Clientes VIP, Comerciales, Administrativo --}}
            <div class="navegacion-diferentes-usuarios">
                <div class="contenedor-navegacion-usuarios flex flex-row">
                    <button id="boton-efecto-active-cNoVip"
                        class="botones-navegacion-usuarios boton-navegacion-usuario-active flex flex-col">Clientes
                        <span class="linea-blanca"></span><span id="linea-roja-cNoVip"
                            class="linea-roja-cVIP"></span></button>
                    <button id="boton-efecto-active-cVIP"
                        class="botones-navegacion-usuarios boton-navegacion-usuario-active flex flex-col">Clientes
                        VIP<span class="linea-blanca"></span><span id="linea-roja-cVip"
                            class="linea-roja-cli"></span></button>
                </div>
            </div>
        </div>

        <div id="datatable" class="flex justify-start ml-32">
            <div id="tabla-clientes-noVip" class="w-[1200px]">
                @livewire('tabla-clientes')
            </div>

            <div id="tabla-clientes-vip" class="w-[1200px] hidden">
                @livewire('tabla-clientes-vip')
            </div>
        </div>
        <script src="/js/script.js"></script>
</body>

</html>
