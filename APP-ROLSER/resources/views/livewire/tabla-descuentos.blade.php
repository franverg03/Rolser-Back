<div>
    <section class="mt-10">
            <!-- Barra de búsqueda -->
            <div class="flex items-center justify-between p-4">
                <div class="relative">
                    <input wire:model.live.debounce.100ms="search" type="text"
                        class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 pr-10 p-2"
                        placeholder="Buscar descuento..." id="searchInput">
                </div>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left bg-white border-collapse bordeRolser">
                    <thead class="text-xs uppercase color-cabecera-tabla-admin text-white font-bold">
                        <tr>
                            <th class="px-4 py-3 border-b bordeRolser">Descripción</th>
                            <th class="px-4 py-3 border-b bordeRolser">Cliente</th>
                            <th class="px-4 py-3 border-b bordeRolser">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($descuentosPaginados as $descuento)
                            <tr class="border-b bordeRolser">
                                <td class="px-4 py-3">{{ $descuento->descripcion_descuento }}</td>
                                <td class="px-4 py-3">{{ $descuento->cliente->cliente_nombre_representante }} {{ $descuento->cliente->cliente_apellidos_representante }}</td>
                                <td class="px-4 py-3">{{ $descuento->porcentaje_descuento }}</td>
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
                {{ $descuentosPaginados->links()}}
            </div>
    </section>
</div>
