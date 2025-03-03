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

    <title>ClientesComercialRolser</title>
</head>

<body class="contenedor">
    <div class="menu-comercial flex">
        <div class="menu-pequenyo-comercial flex flex-col" id="menu-pequenyo-administrativo">
            <img class="mt-3 ml-1 logo-pequenyo-comercial" width="40vh" src="/images/logoPequenyoRolser.png"
                alt="">
            <svg class="icono-cliente-comercial" width="42" height="42" viewBox="0 0 42 42" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7 35C7 29.75 14 29.75 17.5 26.25C19.25 24.5 14 24.5 14 15.75C14 9.91725 16.3328 7 21 7C25.6673 7 28 9.91725 28 15.75C28 24.5 22.75 24.5 24.5 26.25C28 29.75 35 29.75 35 35"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
            </svg>
            <div class="iconos-menu-comercial flex flex-col ml-3">
                <!--Home icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.77199 3.07863L3.93283 7.62863C2.95783 8.38697 2.16699 10.0011 2.16699 11.2253V19.2528C2.16699 21.7661 4.21449 23.8245 6.72783 23.8245H19.2728C21.7862 23.8245 23.8337 21.7661 23.8337 19.2636V11.377C23.8337 10.0661 22.9562 8.38697 21.8837 7.63947L15.1887 2.94863C13.672 1.88697 11.2345 1.94113 9.77199 3.07863Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 19.4922V16.2422" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <!--Clientes icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.9997 12.9974C15.9912 12.9974 18.4163 10.5723 18.4163 7.58073C18.4163 4.58919 15.9912 2.16406 12.9997 2.16406C10.0081 2.16406 7.58301 4.58919 7.58301 7.58073C7.58301 10.5723 10.0081 12.9974 12.9997 12.9974Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M22.306 23.8333C22.306 19.6408 18.1352 16.25 13.0002 16.25C7.86517 16.25 3.69434 19.6408 3.69434 23.8333"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <!--Catálogos icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.8337 18.1335V5.0577C23.8337 3.7577 22.772 2.79354 21.4828 2.90187H21.4178C19.1428 3.09687 15.687 4.25604 13.7587 5.46937L13.5745 5.58854C13.2603 5.78354 12.7403 5.78354 12.4262 5.58854L12.1553 5.42604C10.227 4.22354 6.78199 3.0752 4.50699 2.89104C3.21783 2.7827 2.16699 3.7577 2.16699 5.04687V18.1335C2.16699 19.1735 3.01199 20.1485 4.05199 20.2785L4.36616 20.3219C6.71699 20.636 10.3462 21.8277 12.4262 22.9652L12.4695 22.9869C12.762 23.1494 13.2278 23.1494 13.5095 22.9869C15.5895 21.8385 19.2295 20.636 21.5912 20.3219L21.9487 20.2785C22.9887 20.1485 23.8337 19.1735 23.8337 18.1335Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 5.94531V22.1953" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M8.39551 9.19531H5.95801" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M9.20801 12.4453H5.95801" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                {{-- Facturas icono --}}
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.4626 11.31L22.4009 15.8384C21.4909 19.7492 19.6926 21.3309 16.3126 21.0059C15.7709 20.9625 15.1859 20.8651 14.5576 20.7134L12.7376 20.28C8.22009 19.2075 6.82259 16.9759 7.88426 12.4476L8.94592 7.90838C9.16259 6.98755 9.42259 6.18588 9.74759 5.52505C11.0151 2.90338 13.1709 2.19922 16.7893 3.05505L18.5984 3.47755C23.1376 4.53922 24.5243 6.78172 23.4626 11.31Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M16.312 21.0057C15.6403 21.4607 14.7953 21.8399 13.7661 22.1757L12.0545 22.7391C7.75362 24.1257 5.48945 22.9666 4.09195 18.6657L2.70528 14.3866C1.31862 10.0857 2.46695 7.81074 6.76778 6.42407L8.47945 5.86074C8.92362 5.7199 9.34612 5.60074 9.74695 5.5249C9.42195 6.18574 9.16195 6.9874 8.94529 7.90824L7.88362 12.4474C6.82195 16.9757 8.21945 19.2074 12.737 20.2799L14.557 20.7132C15.1853 20.8649 15.7703 20.9624 16.312 21.0057Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.6953 9.24072L18.9495 10.5732" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12.6328 13.4333L15.7745 14.235" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <!--Pedidos icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.2503 2.16406V12.9974C16.2503 14.1891 15.2753 15.1641 14.0837 15.1641H2.16699V6.4974C2.16699 4.10323 4.10616 2.16406 6.50033 2.16406H16.2503Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M23.8337 15.1641V18.4141C23.8337 20.2124 22.382 21.6641 20.5837 21.6641H19.5003C19.5003 20.4724 18.5253 19.4974 17.3337 19.4974C16.142 19.4974 15.167 20.4724 15.167 21.6641H10.8337C10.8337 20.4724 9.85866 19.4974 8.66699 19.4974C7.47533 19.4974 6.50033 20.4724 6.50033 21.6641H5.41699C3.61866 21.6641 2.16699 20.2124 2.16699 18.4141V15.1641H14.0837C15.2753 15.1641 16.2503 14.1891 16.2503 12.9974V5.41406H18.2437C19.0237 5.41406 19.7386 5.83657 20.1286 6.50824L21.9812 9.7474H20.5837C19.9878 9.7474 19.5003 10.2349 19.5003 10.8307V14.0807C19.5003 14.6766 19.9878 15.1641 20.5837 15.1641H23.8337Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M8.66667 23.8333C9.86328 23.8333 10.8333 22.8633 10.8333 21.6667C10.8333 20.47 9.86328 19.5 8.66667 19.5C7.47005 19.5 6.5 20.47 6.5 21.6667C6.5 22.8633 7.47005 23.8333 8.66667 23.8333Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M17.3337 23.8333C18.5303 23.8333 19.5003 22.8633 19.5003 21.6667C19.5003 20.47 18.5303 19.5 17.3337 19.5C16.137 19.5 15.167 20.47 15.167 21.6667C15.167 22.8633 16.137 23.8333 17.3337 23.8333Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M23.8333 13V15.1667H20.5833C19.9875 15.1667 19.5 14.6792 19.5 14.0833V10.8333C19.5 10.2375 19.9875 9.75 20.5833 9.75H21.9808L23.8333 13Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="iconos-usuario-logout-comercial">
                <img width="35px" class="imagen-usuario-comercial" src="/images/administrativoFran.png"
                    alt="">
                <!--LogOut icono-->
                <svg class="icono-logout-comercial" width="27" height="27" viewBox="0 0 27 27"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.0127 8.50844C10.3614 4.45844 12.4427 2.80469 16.9989 2.80469H17.1452C22.1739 2.80469 24.1877 4.81844 24.1877 9.84719V17.1822C24.1877 22.2109 22.1739 24.2247 17.1452 24.2247H16.9989C12.4764 24.2247 10.3952 22.5934 10.0239 18.6109"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16.8748 13.5H4.07227" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M6.58125 9.73438L2.8125 13.5031L6.58125 17.2719" stroke="white" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="menu-grande-comercial d-flex flex-col" id="menu-grande-administrativo">
            <img class="mt-4 ml-3 logo-grande-comercial" width="130vh" src="/images/logoGrandeRolser.png"
                alt="">
            <button class="boton-comercial-cliente">Cliente</button>
            <div class="div-menu-grande-comercial">
                <a href="{{ route('comercial.home')}}" class="boton-menu-noSel-comercial">Home</a>
                <a href="{{ route('comercial.clientes')}}" class="boton-menu-sel-comercial">Clientes</a>
                <a href="{{ route('comercial.catalogos')}}" class="boton-menu-noSel-comercial">Catálogos</a>
                <a href="{{ route('comercial.facturas')}}" class="boton-menu-noSel-comercial">Facturas</a>
                <a href="{{ route('comercial.pedidos')}}" class="boton-menu-noSel-comercial">Pedidos</a>
            </div>

            <div class="caja-info-usuario-comercial-logout">
                <div class="pl-4 caja-info-usuario-comercial">
                    <h3 class="usuario-nombre-comercial">Francisco Verdeguer</h3>
                    <p class="info-usuario-comercial">Autenticado como: Comercial</p>
                    <p class="info-usuario-comercial">Fecha: 11/02/2025</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field()}}
                    <button type="submit" class="boton-logout-comercial d-flex">Cerrar&nbsp;sesión</button>
                </form>
            </div>
        </div>
    </div>

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
            <div class="flex flex-col">
                <div class="flex flex-col justify-center">
                    {{-- Navegación entre datatables Clientes VIP, Clientes No VIP --}}
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
                {{-- Probamos como triggerear el modal en laravel --}}

                <div class="flex flex-row justify-center">
                    <div id="crudCliente" class="">
                        <div class="flex flex-row">
                            {{-- Añadir --}}
                            <button id="mostrarModalAnyadir" class="botonEliminar">Añadir cliente <svg width="18"
                                    height="18" viewBox="0 0 18 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 9.69531H13.5" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 14.4697V4.92969" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            {{-- Modificar --}}
                            <button id="mostrarModalModificar" class="botonEliminar">Modificar cliente <svg
                                    width="18" height="18" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.95801 1.08594H4.87467C2.16634 1.08594 1.08301 2.16927 1.08301 4.8776V8.1276C1.08301 10.8359 2.16634 11.9193 4.87467 11.9193H8.12467C10.833 11.9193 11.9163 10.8359 11.9163 8.1276V7.04427"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8.68851 1.6339L4.42018 5.90223C4.25768 6.06473 4.09518 6.38431 4.06268 6.61723L3.82976 8.24765C3.7431 8.83806 4.16018 9.24973 4.7506 9.16848L6.38101 8.93556C6.60851 8.90306 6.9281 8.74056 7.09601 8.57806L11.3643 4.30973C12.101 3.57306 12.4477 2.71723 11.3643 1.6339C10.281 0.550562 9.42518 0.897228 8.68851 1.6339Z"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.07617 2.25C8.43909 3.54458 9.45201 4.5575 10.752 4.92583"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            {{-- Eliminar --}}
                            <button id="mostrarConfirmacionEliminar" class="botonEliminar">Deshabilitar cliente<svg
                                    width="18" height="18" viewBox="0 0 24 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9.49219H18" stroke="white" stroke-width="3.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>

                    <div id="crudClienteVip" class="hidden">
                        <div class="flex flex-row">
                            {{-- Añadir --}}
                            <button id="mostrarModalAnyadirCVip" class="botonEliminar">Añadir cliente VIP<svg
                                    width="18" height="18" viewBox="0 0 18 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 9.69531H13.5" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 14.4697V4.92969" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            {{-- Modificar --}}
                            <button id="mostrarModalModificarCVip" class="botonEliminar">Modificar cliente VIP <svg
                                    width="18" height="18" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.95801 1.08594H4.87467C2.16634 1.08594 1.08301 2.16927 1.08301 4.8776V8.1276C1.08301 10.8359 2.16634 11.9193 4.87467 11.9193H8.12467C10.833 11.9193 11.9163 10.8359 11.9163 8.1276V7.04427"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8.68851 1.6339L4.42018 5.90223C4.25768 6.06473 4.09518 6.38431 4.06268 6.61723L3.82976 8.24765C3.7431 8.83806 4.16018 9.24973 4.7506 9.16848L6.38101 8.93556C6.60851 8.90306 6.9281 8.74056 7.09601 8.57806L11.3643 4.30973C12.101 3.57306 12.4477 2.71723 11.3643 1.6339C10.281 0.550562 9.42518 0.897228 8.68851 1.6339Z"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.07617 2.25C8.43909 3.54458 9.45201 4.5575 10.752 4.92583"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            {{-- Eliminar --}}
                            <button id="mostrarConfirmacionEliminarCVip" class="botonEliminar">Deshabilitar cliente
                                VIP<svg width="18" height="18" viewBox="0 0 24 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9.49219H18" stroke="white" stroke-width="3.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>

                    <!-- Modal (inicialmente oculto) -->
                    <div id="modalConfirmacionEliminar" class="fixed inset-0 z-10 hidden"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <!-- Fondo oscuro -->
                        <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>

                        <!-- Contenedor del modal -->
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div
                                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div
                                    class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                                    <div class="cajaTxt mt-4">
                                        <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres eliminarlo?</h3>
                                        <h4 class="infoConfi">La siguiente acción eliminará al cliente seleccionado.
                                        </h4>
                                    </div>
                                    <div class=" btnCaja flex flex-row">
                                        <button id="ocultarConfirmacionCancelar"
                                            class="cancelConfi w-[50%]">Cancelar</button>
                                        <button id="ocultarConfirmacionConfirmar"
                                            class="confirmConfi w-[50%]">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                {{-- Modal modificar cnovip --}}
                <form id="formularioActualizarCliente" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cliente_id" id="cliente_id" value="">

                    <div id="modalModificar" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <!-- Fondo oscuro -->
                        <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                        <!-- Contenedor del modal -->
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                                    <div class="cabeceraModalModificar flex flex-row justify-between">
                                        <h3 class="estilosTituloModalModificar">Modificar cliente No VIP</h3>
                                        <svg class="hoverX" id="ocultarModificarCancelarCNoVip" width="55" height="55" viewBox="0 0 35 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001"
                                                stroke="#90242A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <!-- Sección Datos representante -->
                                    <div class="flex flex-col cajaSeccionesModalMod">
                                        <div class="flex">
                                            <h5 class="seccionesModalModificar">Datos representante:</h5>
                                        </div>
                                        <div class="flex flex-row">
                                            <input type="text" name="nombre" id="nombre"
                                                class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                placeholder="Nombre" />
                                            <input type="text" name="apellidos" id="apellidos"
                                                class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                placeholder="Apellidos" />
                                        </div>
                                    </div>

                                    <!-- Sección Contacto -->
                                    <div class="flex flex-col cajaSeccionesModalMod">
                                        <div class="flex">
                                            <h5 class="seccionesModalModificar">Contacto:</h5>
                                        </div>
                                        <div class="flex flex-row">
                                            <input type="text" name="telefono" id="telefono"
                                                class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                placeholder="Ej: Tlf XXX-XXX-XXX" />
                                            <input type="email" name="email" id="email"
                                                class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                placeholder="correo@ejemplo.com" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Dirección:</label>
                                        </div>
                                        <input type="text" id="direccion" name="direccion"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Dirección de la empresa" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CP:</label>
                                        </div>
                                        <input type="text" id="codigoPostal" name="codigoPostal"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CP" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">NIF:</label>
                                        </div>
                                        <input type="text" id="nif" name="nif"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="NIF" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">IBAN:</label>
                                        </div>
                                        <input type="text" id="iban" name="iban"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nº de Cuenta" />

                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Tarifa:</label>
                                        </div>
                                        <input type="text" id="tarifa" name="tarifa"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Tarifa(%)" />
                                    </div>

                                    <div class="flex flex-row mt-4">
                                        <button id="mostrarModalConfirmacionGuardarCNoVip" type="button"
                                            class="botonEliminar margen-boton-modificar">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Confirmación -->
                    <div id="modalConfirmacionGuardarCambiosCNoVip" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="cajaTxt mt-4">
                                        <h3 class="cabeceraConfi m-4">¿Estás seguro de guardar estos cambios?</h3>
                                        <h4 class="infoConfi">La siguiente acción guardará las modificaciones realizadas.</h4>
                                    </div>
                                    <div class="btnCaja flex flex-row">
                                        <button id="cancelarModalConfirmacionGuardarCNoVip" type="button" class="cancelConfi w-[50%]">
                                            Cancelar
                                        </button>
                                        <button id="confirmarModalConfirmacionGuardarCNoVip" type="submit" class="confirmConfi w-[50%]">
                                            Confirmar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



            </div>

            {{-- Modal añadir --}}
            <div id="modalAnyadir" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        {{-- Este div de abajo hay que convertirlo en un form con method post --}}
                        <div
                            class="relative transform overflow-hidden cajaModalModificarTablet text-center  rounded-lg bg-white shadow-xl transition-all">
                            <div class="cabeceraModalModificar flex flex-row justify-between">
                                <h3 class="estilosTituloModalModificar">Nuevo cliente</h3>
                                <svg class="hoverX" id="ocultarAnyadirCancelar" width="55" height="55"
                                    viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos representante:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre" />
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Apellidos" />
                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Contacto:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Ej: Tlf XXX-XXX-XXX" />
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="correo@ejemplo.com" />
                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos facturación:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Empresa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nombre de la empresa" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Dirección:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Dirección de la empresa" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CP:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CP" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CIF:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CIF" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">IBAN:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nº de Cuenta" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Tarifa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Tarifa(%)" />
                                    </div>
                                    <button id="mostrarModalConfirmacionAnyadir"
                                        class="botonEliminar margen-boton-anyadir">Añadir cliente<svg width="18"
                                            height="18" viewBox="0 0 18 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 9.69531H13.5" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 14.4697V4.92969" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal confirmacion añadir --}}
            <div id="modalConfirmacionAnyadir" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="cajaTxt mt-4">
                                <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres añadirlo?</h3>
                                <h4 class="infoConfi">La siguiente acción creará un nuevo cliente.</h4>
                            </div>
                            <div class=" btnCaja flex flex-row">
                                <button id="cancelarModalConfirmacionAnyadirCNoVip"
                                    class="cancelConfi w-[50%]">Cancelar</button>
                                <button id="confirmarModalConfirmacionAnyadirCNoVip"
                                    class="confirmConfi w-[50%]">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CRUD Modales Clientes VIP --}}
            <div class="flex flex-center justify-center mt-6">
                <!-- Modal (inicialmente oculto) -->
                <div id="modalConfirmacionEliminarCVip" class="fixed inset-0 z-10 hidden"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Fondo oscuro -->
                    <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>

                    <!-- Contenedor del modal -->
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div
                                class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                                <div class="cajaTxt mt-4">
                                    <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres deshabilitarlo?</h3>
                                    <h4 class="infoConfi">La siguiente acción deshabilitará los usuarios, pero no
                                        borrará
                                        sus datos.</h4>
                                </div>
                                <div class=" btnCaja flex flex-row">
                                    <button id="ocultarConfirmacionCancelarCVip"
                                        class="cancelConfi w-[50%]">Cancelar</button>
                                    <button id="ocultarConfirmacionConfirmarCVip"
                                        class="confirmConfi w-[50%]">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal modificar cvip --}}
            <form id="formularioActualizarCliente" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="cliente_id" id="cliente_id" value="">

            <div id="modalModificarCVip" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        {{-- Este div de abajo hay que convertirlo en un form con method post --}}
                        <div
                            class="relative transform overflow-hidden cajaModalModificarTablet text-center  rounded-lg bg-white shadow-xl transition-all">
                            <div class="cabeceraModalModificar flex flex-row justify-between">
                                <h3 class="estilosTituloModalModificar">Modificar cliente VIP</h3>
                                <svg class="hoverX" id="ocultarModificarCancelarCVip" width="55" height="55"
                                    viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos representante:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre" />
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Apellidos" />

                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Contacto:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Ej: Tlf XXX-XXX-XXX" />

                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="correo@ejemplo.com" />
                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos facturación:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Empresa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nombre de la empresa" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Dirección:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Dirección de la empresa" />

                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CP:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CP" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CIF:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CIF" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">IBAN:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nº de Cuenta" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Tarifa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Tarifa(%)" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Contraseña:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Contraseña" />

                                    </div>
                                    <button id="mostrarModalConfirmacionGuardarCVip"
                                        class="botonEliminar margen-boton-modificar">Guardar<svg width="18"
                                            height="18" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.30957 14.3947L10.8096 15.8174L14.8096 12.0234" stroke="white"
                                                stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M10 6.14557H14C16 6.14557 16 5.19707 16 4.24857C16 2.35156 15 2.35156 14 2.35156H10C9 2.35156 8 2.35156 8 4.24857C8 6.14557 9 6.14557 10 6.14557Z"
                                                stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M16 4.26562C19.33 4.43635 21 5.60301 21 9.93765V15.6286C21 19.4226 20 21.3196 15 21.3196H9C4 21.3196 3 19.4226 3 15.6286V9.93765C3 5.61249 4.67 4.43635 8 4.26562"
                                                stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal confirmacion guardar --}}
                <div id="modalConfirmacionGuardarCambiosCVip" class="fixed inset-0 z-10 hidden"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Fondo oscuro -->
                    <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                    <!-- Contenedor del modal -->
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div
                                class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="cajaTxt mt-4">
                                    <h3 class="cabeceraConfi m-4">¿Estás seguro de guardar estos cambios?</h3>
                                    <h4 class="infoConfi">La siguiente acción guardará las modificaciones realizadas.
                                    </h4>
                                </div>
                                <div class=" btnCaja flex flex-row">
                                    <button id="cancelarModalConfirmacionGuardarCVip"
                                        class="cancelConfi w-[50%]">Cancelar</button>
                                    <button id="confirmarModalConfirmacionGuardarCVip"
                                        class="confirmConfi w-[50%]">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Modal añadir --}}
            <div id="modalAnyadirCVip" class="fixed inset-0 z-10 hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        {{-- Este div de abajo hay que convertirlo en un form con method post --}}
                        <div
                            class="relative transform overflow-hidden cajaModalModificar text-center  rounded-lg bg-white shadow-xl transition-all">
                            <div class="cabeceraModalModificar flex flex-row justify-between">
                                <h3 class="estilosTituloModalModificar">Nuevo cliente VIP</h3>
                                <svg class="hoverX" id="ocultarAnyadirCancelarCVip" width="55" height="55"
                                    viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos representante:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre" />

                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Apellidos" />

                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Contacto:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Ej: Tlf XXX-XXX-XXX" />

                                    <input type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="correo@ejemplo.com" />

                                </div>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos facturación:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Empresa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nombre de la empresa" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Dirección:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Dirección de la empresa" />

                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CP:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CP" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">CIF:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CIF" />

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">IBAN:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nº de Cuenta" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-4">
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Tarifa:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Tarifa(%)" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">Contraseña:</label>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Contraseña" />
                                    </div>
                                    <button id="mostrarModalConfirmacionAnyadirCVip"
                                        class="botonEliminar margen-boton-anyadir-cli-vip">Añadir cliente<svg
                                            width="18" height="18" viewBox="0 0 18 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 9.69531H13.5" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 14.4697V4.92969" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal confirmacion guardar --}}
                <div id="modalConfirmacionAnyadirCambiosCVip" class="fixed inset-0 z-10 hidden"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Fondo oscuro -->
                    <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                    <!-- Contenedor del modal -->
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div
                                class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="cajaTxt mt-4">
                                    <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres registrarlo?</h3>
                                    <h4 class="infoConfi">La siguiente acción creará un nuevo cliente VIP y un usuario
                                        para
                                        iniciar sesión.</h4>
                                </div>
                                <div class=" btnCaja flex flex-row">
                                    <button id="cancelarModalConfirmacionAnyadirCVip"
                                        class="cancelConfi w-[50%]">Cancelar</button>
                                    <button id="confirmarModalConfirmacionAnyadirCVip"
                                        class="confirmConfi w-[50%]">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="datatable" class="flex  justify-center items-center">
            <div id="tabla-clientes-noVip" class="w-[800px]">
                @livewire('tabla-clientes-tablet')
            </div>

            <div id="tabla-clientes-vip" class="w-[800px] hidden">
                @livewire('tabla-clientes-vip-tablet')
            </div>
        </div>
    </div>
    </div>
    <script src="/js/clientesComercial.js"></script>
</body>

</html>
