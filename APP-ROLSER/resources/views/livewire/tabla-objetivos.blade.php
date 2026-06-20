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
                    placeholder="Buscar Objetivo..." id="searchInput">

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

        <div>
            <div class="max-h-[400px] overflow-y-auto pr-2 w-[900px]">
                <table class="w-full text-sm text-left bg-white border-collapse bordeRolser">
                    <thead class="text-xs uppercase text-white font-bold sticky top-0 colorFondoTablas">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-center">Tipo de Objetivo</th>
                            <th scope="col" class="px-4 py-3 text-center">Fecha Límite</th>
                            <th scope="col" class="px-4 py-3 text-center">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($objetivos as $objetivo)
                            <tr class="tamanyoCelda hover:bg-gray-50 transition-colors">
                                <td wire:click.prevent="abrirModalMostrar({{ $objetivo->id_objetivo_venta }})"
                                    class="px-4 py-3 text-center tipografia-contenido-tabla-administrativo cursor-pointer hover:text-red-700 hover:underline">
                                    {{ $objetivo->tipo_objetivo }}
                                </td>

                                <td wire:click.prevent="abrirModalMostrar({{ $objetivo->id_objetivo_venta }})"
                                    class="px-4 py-3 text-center tipografia-contenido-tabla-administrativo cursor-pointer hover:text-red-700 hover:underline">
                                    {{ \Carbon\Carbon::parse($objetivo->fecha_fin)->format('d/m/Y') }}
                                </td>

                                 <td wire:click.prevent="abrirModalMostrar({{ $objetivo->id_objetivo_venta }})"
                                    class="px-4 py-3 text-center tipografia-contenido-tabla-administrativo cursor-pointer hover:text-red-700 hover:underline">
                                    {{ $objetivo->descripcion_objetivo }}
                                </td>
                            </tr>
                        @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-gray-500 font-semibold text-lg">
                                            No se encontraron objetivos.
                                        </td>
                                    </tr>
                        @endforelse
                    </tody>
                </table>
            </div>
        </div>

    @if ($modalMostrar)
        <div class="fixed inset-0 z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <div class="fixed inset-0 z-30 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Detalles del Objetivo</h3>
                            <svg wire:click.prevent="cerrarModalMostrar" class="hoverX cursor-pointer" width="55" height="55" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod p-6 gap-4">
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-col flex-1">
                                    <label class="labelsModal text-left">Tipo de Objetivo:</label>
                                    <input wire:model="tipo_objetivo" type="text" class="tamanyoInputGrandeModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" readonly />
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label class="labelsModal text-left">Descripción:</label>
                                <textarea wire:model="descripcion_objetivo" class="w-[450px] p-2 border bordeRolser rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 resize-none h-24" readonly></textarea>
                            </div>
                            <div class="flex flex-row gap-4 mt-2">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Valor Actual:</label>
                                    <input wire:model="valor_actual" type="text" class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 font-bold" readonly />
                                </div>
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Meta a alcanzar:</label>
                                    <input wire:model="valor_meta" type="text" class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 font-bold text-[#90242A]" readonly />
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 mt-2">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Fecha Inicio:</label>
                                    <input wire:model="fecha_inicio" type="text" class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" readonly />
                                </div>
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Fecha Fin:</label>
                                    <input wire:model="fecha_fin" type="text" class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" readonly />
                                </div>
                            </div>

                            <div class="flex flex-row">
                                <div class="px-8 py-5">
                                    @php
                                        $porcentaje = $this->calcularProgreso($objetivo->valor_actual, $objetivo->valor_meta);
                                    @endphp
                                    <div class="flex justify-between mb-2">
                                        <span class="text-lg font-bold text-gray-700 mr-1">Meta: {{ $objetivo->valor_actual }} / {{ $objetivo->valor_meta }}</span>
                                        <span class="text-lg font-bold text-[#90242A]">{{ $porcentaje }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-300 rounded-full h-3">
                                        <div class="bg-[#90242A] h-3 rounded-full transition-all duration-500 ease-out" style="width: {{ $porcentaje }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
