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
    <title>AlmacenesAdministrativoRolser</title>
</head>

<body class="contenedor">
    <div class="menu-administrativo flex">
        <div class="menu-pequenyo-administrativo flex flex-col" id="menu-pequenyo-administrativo">
            <img class="mt-3 mb-1 ml-1 logo-pequenyo-administrativo" width="60vh" src="/images/logoPequenyoRolser.png"
                alt="">
            <div class="iconos-menu-administrativo flex flex-col ml-4">
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
                <!--Usuarios icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.652 23.4203C18.6986 23.702 17.572 23.832 16.2503 23.832H9.7503C8.42863 23.832 7.30197 23.702 6.34863 23.4203C6.58697 20.6037 9.47947 18.3828 13.0003 18.3828C16.5211 18.3828 19.4136 20.6037 19.652 23.4203Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M16.2503 2.16406H9.75032C4.33366 2.16406 2.16699 4.33073 2.16699 9.7474V16.2474C2.16699 20.3424 3.40199 22.5849 6.34866 23.4191C6.58699 20.6024 9.47949 18.3815 13.0003 18.3815C16.5212 18.3815 19.4137 20.6024 19.652 23.4191C22.5987 22.5849 23.8337 20.3424 23.8337 16.2474V9.7474C23.8337 4.33073 21.667 2.16406 16.2503 2.16406ZM13.0003 15.3482C10.8553 15.3482 9.12199 13.6041 9.12199 11.4591C9.12199 9.31408 10.8553 7.58073 13.0003 7.58073C15.1453 7.58073 16.8787 9.31408 16.8787 11.4591C16.8787 13.6041 15.1453 15.3482 13.0003 15.3482Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M16.8787 11.4643C16.8787 13.6093 15.1454 15.3534 13.0004 15.3534C10.8554 15.3534 9.12207 13.6093 9.12207 11.4643C9.12207 9.31929 10.8554 7.58594 13.0004 7.58594C15.1454 7.58594 16.8787 9.31929 16.8787 11.4643Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                <!--Productos icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.43457 8.0625L13.0004 13.5983L22.5012 8.095" stroke="white" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 23.4118V13.5859" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M10.7572 2.68542L4.9722 5.89209C3.66137 6.61792 2.58887 8.43793 2.58887 9.93293V16.0538C2.58887 17.5488 3.66137 19.3688 4.9722 20.0946L10.7572 23.3121C11.9922 23.9946 14.018 23.9946 15.253 23.3121L21.038 20.0946C22.3489 19.3688 23.4214 17.5488 23.4214 16.0538V9.93293C23.4214 8.43793 22.3489 6.61792 21.038 5.89209L15.253 2.67459C14.0072 1.99209 11.9922 1.99209 10.7572 2.68542Z"
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
                <!--Almacenes icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.43359 8.05469L12.9994 13.5905L22.5002 8.08715" stroke="white" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12.999 23.404V13.5781" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M10.7572 2.68406L4.97218 5.9016C3.66135 6.62743 2.58887 8.44741 2.58887 9.94241V16.0633C2.58887 17.5583 3.66135 19.3782 4.97218 20.1041L10.7572 23.3216C11.9922 24.0041 14.018 24.0041 15.253 23.3216L21.038 20.1041C22.3489 19.3782 23.4213 17.5583 23.4213 16.0633V9.94241C23.4213 8.44741 22.3489 6.62743 21.038 5.9016L15.253 2.68406C14.0072 1.99073 11.9922 1.99073 10.7572 2.68406Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.4166 14.347V10.382L8.13574 4.44531" stroke="white" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <!--Descuentos icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21.1253 13.5443C21.1253 12.0493 22.3387 10.8359 23.8337 10.8359V9.7526C23.8337 5.41927 22.7503 4.33594 18.417 4.33594H7.58366C3.25033 4.33594 2.16699 5.41927 2.16699 9.7526V10.2943C3.66199 10.2943 4.87533 11.5076 4.87533 13.0026C4.87533 14.4976 3.66199 15.7109 2.16699 15.7109V16.2526C2.16699 20.5859 3.25033 21.6693 7.58366 21.6693H18.417C22.7503 21.6693 23.8337 20.5859 23.8337 16.2526C22.3387 16.2526 21.1253 15.0393 21.1253 13.5443Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.75 15.9766L16.25 9.47656" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M16.2437 15.9792H16.2535" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M9.74372 10.0182H9.75345" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <!--Tarifas icono-->
                <svg class="iconosM" width="26" height="26" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21.6667 7.62406V18.3707C21.6667 20.0174 21.515 21.1874 21.125 22.0216C21.125 22.0324 21.1141 22.0541 21.1033 22.0649C20.865 22.3682 20.5508 22.5199 20.1825 22.5199C19.6083 22.5199 18.915 22.1407 18.1675 21.3391C17.2792 20.3857 15.9141 20.4616 15.1341 21.5016L14.04 22.9532C13.6067 23.5382 13.0325 23.8307 12.4583 23.8307C11.8842 23.8307 11.31 23.5382 10.8766 22.9532L9.77169 21.4907C9.00252 20.4616 7.64832 20.3857 6.75999 21.3282L6.74915 21.3391C5.52498 22.6499 4.44169 22.8449 3.81335 22.0649C3.80252 22.0541 3.79167 22.0324 3.79167 22.0216C3.40167 21.1874 3.25 20.0174 3.25 18.3707V7.62406C3.25 5.9774 3.40167 4.80739 3.79167 3.97323C3.79167 3.96239 3.79169 3.95156 3.81335 3.94073C4.43085 3.1499 5.52498 3.34489 6.74915 4.65573L6.75999 4.66656C7.64832 5.60906 9.00252 5.53323 9.77169 4.50406L10.8766 3.04156C11.31 2.45656 11.8842 2.16406 12.4583 2.16406C13.0325 2.16406 13.6067 2.45656 14.04 3.04156L15.1341 4.49323C15.9141 5.53323 17.2792 5.60906 18.1675 4.65573C18.915 3.85406 19.6083 3.47489 20.1825 3.47489C20.5508 3.47489 20.865 3.6374 21.1033 3.94073C21.125 3.95156 21.125 3.96239 21.125 3.97323C21.515 4.80739 21.6667 5.9774 21.6667 7.62406Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8.66699 11.1016H17.3337" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M8.66699 14.8984H15.167" stroke="white" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="iconos-usuario-logout-administrativo">
                <img class="imagen-usuario-administrativo" src="/images/administrativoDani.png" alt="">
                <!--LogOut icono-->
                <svg class="icono-logout-administrativo" width="27" height="27" viewBox="0 0 27 27"
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
        <div class="menu-grande-administrativo" id="menu-grande-administrativo">
            <img class="mt-5 ml-3 logo-grande-administrativo" width="180vh" src="/images/logoGrandeRolser.png"
                alt="">
            <div class="div-menu-grande-administrativo">
                <a href="{{ route('administrativo.home') }}" class="boton-menu-noSel-administrativo">Home</a>
                <a href="{{ route('administrativo.clientes') }}" class="boton-menu-noSel-administrativo">Clientes</a>
                <a href="{{ route('administrativo.usuarios') }}" class="boton-menu-noSel-administrativo">Usuarios</a>
                <a href="{{ route('administrativo.pedidos') }}" class="boton-menu-noSel-administrativo">Pedidos</a>
                <a href="{{ route('errors.404') }}" class="boton-menu-noSel-administrativo">Productos</a>
                <a href="{{ route('errors.404') }}" class="boton-menu-noSel-administrativo">Catálogos</a>
                <a href="{{ route('administrativo.almacenes') }}" class="boton-menu-sel-administrativo">Almacenes</a>
                <a href="{{ route('administrativo.descuentos') }}"
                    class="boton-menu-noSel-administrativo">Descuentos</a>
                <a href="{{ route('administrativo.tarifas') }}" class="boton-menu-noSel-administrativo">Tarifas</a>
            </div>
            <div class="caja-info-usuario-admin-logout">
                <div class="pl-4 caja-info-usuario-administrativo">
                    <h3 class="usuario-nombre-administrativo">{{ Auth::user()->administrativo->administrativo_nombre }}
                        {{ Auth::user()->administrativo->administrativo_apellidos }}</h3>
                    <p class="info-usuario-administrativo">Autenticado como: {{ Auth::user()->usuario_rol }}</p>
                    <p class="info-usuario-administrativo">Fecha: {{ now()->format('d/m/Y') }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="boton-logout-administrativo d-flex">Cerrar&nbsp;sesión</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Contenedor principal --}}
    <div class="contenedor-principal-administrativo">
        {{-- Breadcrumb contenedor --}}
        <div class="contenedor-breadcrump-administrativo">
            <div class="maquetacion-breadcrump-administrativo flex flex-row">
                <a class="estilo-breadcrump-administrativo" href="/homeAdministrativo">Home</a>
                <svg class="mt-0.5 ml-1 mr-1" width="20" height="20" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.56836 12.4508L9.64336 8.37578C10.1246 7.89453 10.1246 7.10703 9.64336 6.62578L5.56836 2.55078"
                        stroke="#90242A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <a class="estilo-breadcrump-administrativo" href="/almacenesAdministrativo">Almacenes</a>
            </div>
        </div>
        <div id="datatable" class="flex  justify-start ml-32">
            <div class="w[1200px]">

                @livewire('tabla-almacenes')
            </div>
        </div>
    </div>
    <script src="/js/script.js"></script>
</body>

</html>
