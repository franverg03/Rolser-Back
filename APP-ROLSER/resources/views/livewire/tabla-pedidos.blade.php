<div>
    <div class="flex items-center justify-between">
        <div class="relative ml-28 mt-10">
            {{-- Icono de lupa --}}
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M9.60775 9.60677L13.333 13.332" stroke="#AF272F" stroke-linecap="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.66699 10.668C8.87613 10.668 10.667 8.87711 10.667 6.66797C10.667 4.45883 8.87613 2.66797 6.66699 2.66797C4.45785 2.66797 2.66699 4.45883 2.66699 6.66797C2.66699 8.87711 4.45785 10.668 6.66699 10.668Z"
                        stroke="#AF272F" />
                </svg>
            </div>

            {{-- Input de búsqueda --}}
            <input wire:model.live.debounce.100ms="search" type="text"
                class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 pr-10 p-2"
                placeholder="Buscar Pedido..." id="searchInput">

            {{-- Icono de "X" para limpiar el input --}}
            @if ($search)
                <div class="absolute inset-y-0 right-3 flex items-center cursor-pointer" wire:click="clearSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M14.3569 14.3573L9.64285 9.64328" stroke="#AF272F" stroke-linecap="round" />
                        <path d="M9.6431 14.3573L14.3571 9.64328" stroke="#AF272F" stroke-linecap="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.28595 16.7164C9.88945 19.3198 14.1105 19.3198 16.714 16.7164C19.3175 14.1129 19.3175 9.89176 16.714 7.28826C14.1105 4.68477 9.88945 4.68477 7.28595 7.28826C4.68246 9.89176 4.68246 14.1129 7.28595 16.7164Z"
                            stroke="#AF272F" />
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <!-- Tabla -->
    <div class="contenedorTablas overflow-hidden mt-10">
        <table class="w-full text-center text-sm bg-white border-collapse bordeRolser">
            <thead class="text-xs uppercase color-cabecera-tabla-admin text-white font-bold">
                <tr>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser">Código de pedido</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser">Fecha de Creación</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser">Total Pedido</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser">Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidosP as $pedido)
                    <tr class="border-b bordeRolser">
                        <td wire:click.prevent="abrirModalMostrar({{ $pedido->id_pedido }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">{{ $pedido->codigo_Pedido }}</td>
                        <td wire:click.prevent="abrirModalMostrar({{ $pedido->id_pedido }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">{{ $pedido->fecha_creacion }}
                        </td>
                        <td wire:click.prevent="abrirModalMostrar({{ $pedido->id_pedido }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">{{ $pedido->total_Pedido }}</td>
                        <td wire:click.prevent="abrirModalMostrar({{ $pedido->id_pedido }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">{{ $pedido->pedido_estado }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-1 text-center text-gray-500">No se encontraron resultados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($modalMostrar)
        <div class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <!-- Contenedor del modal -->
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificar text-center  rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Mostrar Pedido</h3>
                            <svg wire:click.prevent="cerrarModalMostrar" class="hoverX" width="55"
                                height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Detalles del Pedido:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="codigo_Pedido" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Código de Pedido" readonly />
                                <input wire:model="total_Pedido" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Total Pedido" readonly />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Estado del Pedido:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="pedido_estado" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Estado del Pedido" readonly />
                                <input wire:model="fecha_creacion" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Fecha de Creación" readonly />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex flex-row">
                                <input wire:model="id_cliente_vip" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Cliente vip" readonly />
                                <input wire:model="id_cliente_no_vip" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Cliente no vip" readonly />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Comercial:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="id_comercial" type="text" id="searchInput"
                                    class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Dni Comercial" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
