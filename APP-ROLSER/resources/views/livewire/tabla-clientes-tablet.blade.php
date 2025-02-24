<div>
    <section class="mt-1">
        <!-- Barra de búsqueda -->
        <div class="flex items-center justify-between p-4">
            <div class="relative">
                {{-- Icono de lupa --}}
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M9.60775 9.60677L13.333 13.332" stroke="#AF272F" stroke-linecap="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66699 10.668C8.87613 10.668 10.667 8.87711 10.667 6.66797C10.667 4.45883 8.87613 2.66797 6.66699 2.66797C4.45785 2.66797 2.66699 4.45883 2.66699 6.66797C2.66699 8.87711 4.45785 10.668 6.66699 10.668Z" stroke="#AF272F"/>
                    </svg>
                </div>

                {{-- Input de búsqueda --}}
                <input wire:model.live.debounce.100ms="search" type="text"
                    class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2 pl-10 pr-10 borde-focus"
                    placeholder="Buscar administrativo..." id="searchInput">

                {{-- Icono de "X" para limpiar el input --}}
                @if($search)
                    <div class="absolute inset-y-0 right-3 flex items-center cursor-pointer"
                        wire:click="clearSearch">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M14.3569 14.3573L9.64285 9.64328" stroke="#AF272F" stroke-linecap="round"/>
                            <path d="M9.6431 14.3573L14.3571 9.64328" stroke="#AF272F" stroke-linecap="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.28595 16.7164C9.88945 19.3198 14.1105 19.3198 16.714 16.7164C19.3175 14.1129 19.3175 9.89176 16.714 7.28826C14.1105 4.68477 9.88945 4.68477 7.28595 7.28826C4.68246 9.89176 4.68246 14.1129 7.28595 16.7164Z" stroke="#AF272F"/>
                        </svg>
                    </div>
                @endif
            </div>
        </div>

        <!-- Contenedor Scrolleable -->
        <div>
            <div class="max-h-[400px] overflow-y-auto pr-2">
                <table class="w-full text-sm text-left bg-white border-collapse bordeRolser tablaComercial">
                    <thead class="text-xs uppercase bg-red-600 text-white font-bold sticky top-0">
                        <tr>
                            <th scope="col" class="px-4 py-3 rounded-start-1">Seleccionar</th>
                            <th scope="col" class="px-4 py-3">Representante</th>
                            <th scope="col" class="px-4 py-3">Empresa</th>
                            <th scope="col" class="px-4 py-3">NIF</th>
                            <th scope="col" class="px-4 py-3">Contacto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientesT as $clienteT)
                            <tr class="border-b bordeRolser tamanyoCelda">
                                <td class="px-4 py-3">
                                    <input type="checkbox" wire:model="selectedClientes" value="{{ $clienteT->id }}">
                                </td>
                                <td class="px-4 py-3">{{ $clienteT->cliente_nombre_representante }}&nbsp;{{$clienteT->cliente_apellidos_representante }}</td>
                                <td class="px-4 py-3">{{ $clienteT->cliente_empresa }}</td>
                                <td class="px-4 py-3">{{ $clienteT->cliente_nif }}</td>
                                <td class="px-4 py-3">{{ $clienteT->cliente_telefono_representante }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">No se encontraron resultados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
