<div>
    <section class="mt-10">
            <!-- Barra de búsqueda -->
            <div class="flex items-center justify-between p-4">
                <div class="relative">
                    <input wire:model.live.debounce.100ms="search" type="text"
                        class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 pr-10 p-2"
                        placeholder="Buscar cliente..." id="searchInput">
                </div>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left bg-white border-collapse bordeRolser">
                    <thead class="text-xs uppercase bg-red-600 text-white font-bold">
                        <tr>
                            <th class="px-4 py-3 border-b bordeRolser">Representante</th>
                            <th class="px-4 py-3 border-b bordeRolser">Empresa</th>
                            <th class="px-4 py-3 border-b bordeRolser">NIF</th>
                            <th class="px-4 py-3 border-b bordeRolser">Contacto</th>
                            <th class="px-4 py-3 border-b bordeRolser">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientesPaginados as $cliente)
                            <tr class="border-b bordeRolser">
                                <td class="px-4 py-3">{{ $cliente->cliente_nombre_representante }} {{ $cliente->cliente_apellidos_representante }}</td>
                                <td class="px-4 py-3">{{ $cliente->cliente_empresa }}</td>
                                <td class="px-4 py-3">{{ $cliente->cliente_nif }}</td>
                                <td class="px-4 py-3">{{ $cliente->cliente_telefono_representante }}</td>
                                <td class="px-4 py-3 font-bold">{{ $cliente->tipo }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">No se encontraron resultados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="py-4 px-3 flex justify-center">
                {{ $clientesPaginados->links()}}
            </div>
    </section>
</div>
