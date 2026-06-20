<x-layouts.comercial :title="'Pedidos - Comercial'">
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
                <a class="estilo-breadcrump-comercial" href="/pedidosComercial">Pedidos</a>
            </div>
        </div>
        <div id="datatable" class="flex justify-start ml-32">
            <div class="w[1200px]">
                @livewire('tabla-pedidos-comercial')
            </div>
        </div>
    </div>
</x-layouts.comercial>

