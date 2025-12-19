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

    <title>PedidosComercialRolser</title>
</head>

<body class="contenedor">
    @include('comercial.comercial-menu')

    {{-- Contenedor principal --}}
    <div class="contenedor-principal-comercial">
        {{-- Breadcrumb contenedor --}}
        <div class="contenedor-breadcrump-comercial">
            <div class="maquetacion-breadcrump-comercial flex flex-row">
                <a class="estilo-breadcrump-comercial" href="/homeComercial">Home</a>
                <svg class="mt-0.5 ml-1 mr-1" width="20" height="20" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.56836 12.4508L9.64336 8.37578C10.1246 7.89453 10.1246 7.10703 9.64336 6.62578L5.56836 2.55078"
                        stroke="#90242A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <a class="estilo-breadcrump-comercial" href="/clientesComercial">Clientes</a>
            </div>
        </div>
        {{-- Contenedor crud datatable paginacion --}}
        <div>
            <div class="flex"></div>
            <div id="datatable" class="flex  justify-start ml-32">
                <div id="tabla-clientes-noVip" class="w-[900px]">
                    @livewire('tabla-pedidos-tablet')
                </div>
            </div>
        </div>
    </div>

    <script src="/js/script.js"></script>
</body>

</html>
