<div>
    <section class="mt-10">
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
                        class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 pr-10 p-2"
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

            <!-- Tabla -->
            <div class="{{ 'contenedorTablas' }}">
                <table class="w-full text-sm text-left bg-white border-collapse bordeRolser">
                    <thead class="text-xs uppercase bg-red-600 text-white font-bold">
                        <tr>
                            <th scope="col" class="px-4 py-3 border-b bordeRolser">Nombre</th>
                            <th scope="col" class="px-4 py-3 border-b bordeRolser">Apellidos</th>
                            <th scope="col" class="px-4 py-3 border-b bordeRolser">Email</th>
                            <th scope="col" class="px-4 py-3 border-b bordeRolser">Departamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($administrativos as $administrativo)
                            <tr class="border-b bordeRolser">
                                <td class="px-4 py-3">{{ $administrativo->administrativo_nombre }}</td>
                                <td class="px-4 py-3">{{ $administrativo->administrativo_apellidos }}</td>
                                <td class="px-4 py-3">{{ $administrativo->administrativo_email }}</td>
                                <td class="px-4 py-3">{{ $administrativo->administrativo_departamento }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-500">No se encontraron resultados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="py-4 px-3 flex justify-center paginacion-custom">
                <div class="inline-flex rounded-md shadow-sm">
                    {{ $administrativos->links() }}
                </div>
            </div>
    </section>
</div>
