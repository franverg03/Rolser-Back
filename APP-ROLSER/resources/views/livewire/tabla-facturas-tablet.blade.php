<div>
    <div>
        <!-- Barra de búsqueda -->
        <div class="flex items-center justify-between mt-24 mb-8">
            <div class="relative mt-2">
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
                            <th scope="col" class="px-4 py-3">Pedido</th>
                            <th scope="col" class="px-4 py-3">Importe</th>
                            <th scope="col" class="px-4 py-3">Cliente</th>
                            <th scope="col" class="px-4 py-3">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturasT as $factura)
                        <tr class="border-b bordeRolser tamanyoCelda">
                            <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})"
                                class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                                {{ $factura->id_pedido}}</td>
                            <td wire:click.prevent="abrirModalMostrar({{ $factura->id_factura }})"
                                class="px-4 py-3 tipografia-contenido-tabla-administrativo">
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
                            <td>
                                <div class="flex flex-row justify-center">
                                    <button type="button" id="mostrarModalModificar" class="botonCrud mr-3 mb-2"
                                        wire:click.prevent="descargarPDF({{  $factura->id_factura  }})">Descargar
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 16L12 3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7 11L12 16L17 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4 21H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>

                                    <button class="botonCrud"
                                        wire:click.prevent="abrirModalEnviarCorreo({{  $factura->id_factura  }})">Enviar
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 2L11 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
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
        <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-start justify-center p-4 text-center pt-4">
                <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all w-full max-w-[95vw]">
                    <div class="cabeceraModalModificar flex flex-row justify-between items-center p-2">
                        <h3 class="estilosTituloModalModificar text-xl font-bold pl-2">
                        </h3>
                        <svg wire:click.prevent="cerrarModalMostrar" class="cursor-pointer mr-2" width="35" height="35" viewBox="0 0 35 35" fill="none">
                            <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="w-full">
                        <div class="border-4 border-gray-100 rounded-lg h-[85vh] overflow-hidden shadow-inner bg-gray-200">
                            <iframe src="{{ route('factura.preview', $id_factura_seleccionada) }}"
                                    class="w-full h-full"
                                    frameborder="0">
                            </iframe>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($modalEnviarCorreo)
        <div class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <!-- Contenedor del modal -->
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden cajaModalEmail text-center  rounded-lg bg-white shadow-xl transition-all">
                            <div class="cabeceraModalModificar flex flex-row justify-between">
                                <h3 class="estilosTituloModalModificar">Enviar Factura por Correo</h3>
                                <svg wire:click.prevent="cerrarModalEnviarCorreo" class="hoverX" width="55"
                                    height="55" viewBox="0 0 35 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Correo Electrónico:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input wire:model="email_destino" type="email"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="correo@ejemplo.com" />
                                </div>
                                 @error('email_destino') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex flex-row mt-4 justify-end mb-4 mr-6">
                                <button wire:click.prevent="enviarCorreo" type="button"
                                    class="botonEliminar margen-boton-anyadir">Enviar<svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 2L11 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg></button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endif
</div>
