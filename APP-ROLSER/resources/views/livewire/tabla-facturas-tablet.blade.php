<div>
    <div>
        <!-- Barra de búsqueda -->
        <div class="flex items-center justify-between mt-24 mb-8">
            <div class="relative">
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
                    class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2 pl-10 pr-10 borde-focus"
                    placeholder="Buscar Factura..." id="searchInput">

                {{-- Icono de "X" para limpiar el input --}}
                @if ($search)
                    <div class="absolute inset-y-0 right-3 flex items-center cursor-pointer"
                        wire:click.prevent="clearSearch">
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



        <!-- Contenedor Scrolleable -->

        <div>
            <div class="max-h-[400px] overflow-y-auto pr-2  w-[900px]">
                <table class="w-full text-sm text-center bg-white bordeRolser">
                    <thead class="text-xs uppercase color-cabecera-tabla-admin text-white font-bold sticky top-0 colorFondoTablas">
                        <tr>
                            <th class="px-4 py-3 border  border-[#AF272F]">Pedido</th>
                            <th class="px-4 py-3 border border-[#AF272F]">Importe</th>
                            <th class="px-4 py-3 border border-[#AF272F]">Cliente</th>
                            <th class="px-4 py-3 border border-[#AF272F]">Accion</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturasT as $factura)
                        <tr class="border-b border-[#AF272F]">
                            <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})"
                                class="px-4 py-3 border border-[#AF272F] tipografia-contenido-tabla-administrativo">
                                {{ $factura->id_pedido}}</td>
                            <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})"
                                class="px-4 py-3 border border-[#AF272F] tipografia-contenido-tabla-administrativo">
                                {{ $factura->factura_importe_total }}</td>
                            @if ($factura->id_cliente_no_vip)
                                <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})" class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                                    {{ $factura->clienteNoVip->cliente_empresa}}
                                </td>
                            @else
                                <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})" class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                                    {{ $factura->clienteVip?->cliente_empresa ?? 'Empresa no encontrada' }}
                                </td>
                            @endif
                            <td class="border border-[#AF272F]">
                                <div class="flex flex-row justify-center">
                                    <button type="button" id="mostrarModalModificar" class="botonCrud mr-3 mb-2"
                                        wire:click.prevent="abrirModalModificar({{  $factura->id_factura  }})">Descargar
                                        <svg width="15" height="15" viewBox="0 0 13 13" fill="none"
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
                                        </svg>
                                    </button>

                                    <button class="botonCrud"
                                        wire:click.prevent="abrirModalEliminar({{  $factura->id_factura  }})">Enviar<svg
                                            width="20" height="14" viewBox="0 0 24 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 9.49219H18" stroke="white" stroke-width="3.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500">No se encontraron
                                resultados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($modalMostrar)
        <div class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <!-- Contenedor del modal -->
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                        <h3 class="estilosTituloModalModificar">Mostrar Factura</h3>
                        <svg wire:click.prevent="cerrarModalMostrar" class="hoverX" width="55" height="55" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                            <h5 class="seccionesModalModificar">Datos de la Factura:</h5>
                            </div>
                            <div class="flex flex-row">
                            <input wire:model="id_pedido" type="text" class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="ID Pedido" readonly />
                            <input wire:model="factura_importe_total" type="text" class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Importe Total" readonly />
                        </div>
                    </div>
                    <div class="flex flex-col cajaSeccionesModalMod">
                        <div class="flex flex-row">
                            <input wire:model="id_cliente_no_vip" type="text" class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="ID Cliente No VIP" readonly />
                            <input wire:model="id_cliente_vip" type="text" class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="ID Cliente VIP" readonly />
                        </div>
                    </div>
                    <div class="flex flex-col cajaSeccionesModalMod">
                        <div class="flex flex-row">
                            <input wire:model="id_comercial" type="text" class="tamanyoInputMedioGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="ID Comercial" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
