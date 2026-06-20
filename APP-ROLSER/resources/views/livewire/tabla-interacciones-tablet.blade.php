<div>
    <div class="flex items-center justify-between mb-4">
        <div class="relative">
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M9.60775 9.60677L13.333 13.332" stroke="#AF272F" stroke-linecap="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.66699 10.668C8.87613 10.668 10.667 8.87711 10.667 6.66797C10.667 4.45883 8.87613 2.66797 6.66699 2.66797C4.45785 2.66797 2.66699 4.45883 2.66699 6.66797C2.66699 8.87711 4.45785 10.668 6.66699 10.668Z"
                        stroke="#AF272F" />
                </svg>
            </div>
            <input wire:model.live.debounce.100ms="search" type="text"
                class="bg-white bordeRolser text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2 pl-10 pr-10 borde-focus"
                placeholder="Buscar Interacción..." id="searchInput">

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
        <button type="button" class="botonSecundario" wire:click.prevent="abrirModalAnyadir">Añadir Interacción
            <svg width="26" height="28" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 9.69531H13.5" stroke="#af272f" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M9 14.4697V4.92969" stroke="#af272f" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="max-h-[400px] overflow-y-auto pr-2 w-[900px]">
        <table class="w-full text-sm text-left bg-white border-collapse bordeRolser">
            <thead class="text-xs uppercase text-white font-bold sticky top-0 colorFondoTablas">
                <tr>
                    <th scope="col" class="px-4 py-3 text-center">Cliente</th>
                    <th scope="col" class="px-4 py-3 text-center">Fecha</th>
                    <th scope="col" class="px-4 py-3 text-center">Medio Contacto</th>
                    <th scope="col" class="px-4 py-3 text-center">Resumen</th>
                    <th scope="col" class="px-4 py-3 text-center">Resultado</th>
                    <th scope="col" class="px-4 py-3 text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($interacciones as $interaccion)
                    <tr class="border-b bordeRolser tamanyoCelda">
                        <td wire:click.prevent="abrirModalMostrar({{ $interaccion->id_interaccion }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            @if ($interaccion->id_cliente_no_vip)
                                {{ $interaccion->clienteNoVip ? $interaccion->clienteNoVip->cliente_empresa : 'Cliente No VIP no encontrado' }}
                            @else
                                {{ $interaccion->clienteVip ? $interaccion->clienteVip->cliente_empresa : 'Cliente VIP no encontrado' }}
                            @endif
                        </td>
                        <td wire:click.prevent="abrirModalMostrar({{ $interaccion->id_interaccion }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $interaccion->fecha_interaccion ? \Carbon\Carbon::parse($interaccion->fecha_interaccion)->format('d/m/Y') : '' }}
                        </td>
                        <td wire:click.prevent="abrirModalMostrar({{ $interaccion->id_interaccion }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $interaccion->medio_contacto }}
                        </td>
                        <td wire:click.prevent="abrirModalMostrar({{ $interaccion->id_interaccion }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $interaccion->resumen_contacto }}
                        </td>
                        <td wire:click.prevent="abrirModalMostrar({{ $interaccion->id_interaccion }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $interaccion->resultado }}
                        </td>
                        <td>
                            <div class="flex flex-row">
                                <button type="button" class="botonCrud mr-3 mb-2"
                                    wire:click.prevent="abrirModalModificar({{ $interaccion->id_interaccion }})">
                                    Modificar
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
                                    wire:click.prevent="abrirModalEliminar({{ $interaccion->id_interaccion }})">
                                    Eliminar
                                    <svg width="20" height="14" viewBox="0 0 24 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 9.49219H18" stroke="white" stroke-width="3.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">No se encontraron resultados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($modalMostrar)
        <div class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Ficha Interacción</h3>
                            <svg wire:click.prevent="cerrarModalMostrar" class="hoverX cursor-pointer" width="55"
                                height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex flex-row mb-4">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Fecha:</label>
                                    <input wire:model="fecha_interaccion" type="text"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        readonly />
                                </div>
                                <div class="flex flex-col ml-10">
                                    <label class="labelsModal text-left">Medio contacto:</label>
                                    <input wire:model="medio_contacto" type="text"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        readonly />
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="labelsModal text-left">Resumen contacto:</label>
                                <input wire:model="resumen_contacto" type="text"
                                    class="tamanyoInputExtraGrandeModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    readonly />
                            </div>
                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Resultado:</label>
                                    <input wire:model="resultado" type="text"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        readonly />
                                </div>
                                <div class="flex flex-col ml-10">
                                    <label class="labelsModal text-left">Empresa:</label>
                                    <input wire:model="nombre_empresa" type="text"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalAnyadir)
        <div class="fixed inset-0 z-10" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Nueva Interacción</h3>
                            <svg wire:click.prevent="cerrarModalAnyadir" class="hoverX cursor-pointer" width="55"
                                height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod p-4">
                            <div class="flex flex-row gap-4 mb-4">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Fecha:</label>
                                    <input wire:model="fecha_interaccion" type="date"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg  focus:ring-red-500" />
                                </div>
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Medio contacto:</label>
                                    <input wire:model="medio_contacto" type="text"
                                        class="tamanyoInputGrandeModales w-full p-2 border rounded-lg focus:ring-red-500"
                                        placeholder="Medio contacto" />
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="labelsModal text-left">Resumen contacto:</label>
                                <input wire:model="resumen_contacto" type="text"
                                    class="tamanyoInputExtraGrandeModales w-full p-2 border rounded-lg focus:ring-red-500"
                                    placeholder="Resumen contacto" />
                            </div>
                            <div class="flex flex-row mb-4">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Resultado:</label>
                                    <select wire:model="resultado"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:ring-red-500 bg-white text-left">
                                        <option value="">Selecciona resultado</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="seguimiento">Seguimiento</option>
                                        <option value="sin interes">Sin interes</option>
                                    </select>
                                </div>
                                <div class="flex flex-col ml-5">
                                    <label class="labelsModal text-left">Cliente VIP:</label>
                                    <select wire:model.live="id_cliente_vip"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:ring-red-500 bg-white text-left">
                                        <option value="">Selecciona Cliente VIP</option>
                                        @foreach ($clientes_vip as $cliente)
                                            <option value="{{ $cliente->id_cliente_vip ?? $cliente->id_cliente }}">
                                                {{ $cliente->cliente_empresa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="labelsModal text-left">Cliente No VIP:</label>
                                <select wire:model.live="id_cliente_no_vip"
                                    class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:ring-red-500 bg-white text-left">
                                    <option value="">Selecciona Cliente No VIP</option>
                                    @foreach ($clientes_no_vip as $cliente)
                                        <option value="{{ $cliente->id_cliente_no_vip ?? $cliente->id_cliente }}">
                                            {{ $cliente->cliente_empresa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row justify-end mr-24">
                                <button wire:click.prevent="anyadirInteraccion" type="button"
                                    class="botonEliminar flex items-center justify-center gap-2 px-4 py-2 ">
                                    Añadir
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.30957 14.3947L10.8096 15.8174L14.8096 12.0234" stroke="white"
                                            stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M10 6.14557H14C16 6.14557 16 5.19707 16 4.24857C16 2.35156 15 2.35156 14 2.35156H10C9 2.35156 8 2.35156 8 4.24857C8 6.14557 9 6.14557 10 6.14557Z"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M16 4.26562C19.33 4.43635 21 5.60301 21 9.93765V15.6286C21 19.4226 20 21.3196 15 21.3196H9C4 21.3196 3 19.4226 3 15.6286V9.93765C3 5.61249 4.67 4.43635 8 4.26562"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalAnyadirOportunidad && $this->resultado == 'positivo')
        <div class="fixed inset-0 z-10" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Nueva Oportunidad de Venta</h3>
                            <svg wire:click.prevent="cerrarModalAnyadirOportunidad" class="hoverX cursor-pointer"
                                width="55" height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod p-4">
                            <div class="flex flex-row gap-4 mb-4">
                                <div class="flex flex-col flex-1">
                                    <label class="labelsModal text-left">Importe Estimado (€):</label>
                                    <input wire:model="importe_estimado" type="number" step="0.01"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:ring-red-500"
                                        placeholder="1500.00" />
                                </div>
                                <div class="flex flex-col flex-1">
                                    <label class="labelsModal text-left">Posibilidad:</label>
                                    <select wire:model="posibilidad"
                                        class="tamanyoInputGrandeModales w-full p-2 border rounded-lg focus:ring-red-500 bg-white text-left">
                                        <option value="">Selecciona posibilidad</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="labelsModal text-left">Fecha Cierre Prevista:</label>
                                <input wire:model="fecha_cierre_prevista" type="date"
                                    class="tamanyoInputExtraGrandeModales w-full p-2 border rounded-lg focus:ring-red-500" />
                            </div>
                            <div class="flex flex-row justify-end">
                                <button wire:click.prevent="abrirModalConfirmacionAnyadir" type="button"
                                    class="botonEliminar flex items-center justify-center gap-2 px-4 py-2">
                                    Añadir Oportunidad
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.30957 14.3947L10.8096 15.8174L14.8096 12.0234" stroke="white"
                                            stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M10 6.14557H14C16 6.14557H16 5.19707 16 4.24857C16 2.35156 15 2.35156 14 2.35156H10C9 2.35156 8 2.35156 8 4.24857C8 6.14557 9 6.14557 10 6.14557Z"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M16 4.26562C19.33 4.43635 21 5.60301 21 9.93765V15.6286C21 19.4226 20 21.3196 15 21.3196H9C4 21.3196 3 19.4226 3 15.6286V9.93765C3 5.61249 4.67 4.43635 8 4.26562"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalConfirmacionAnyadir)
        <div class="fixed inset-0 z-20" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="cajaTxt mt-4">
                            <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres añadirla?</h3>
                            <h4 class="infoConfi">La siguiente acción creará una nueva interacción y una oportunidad.
                            </h4>
                        </div>
                        <div class="btnCaja flex flex-row">
                            <button wire:click.prevent="cerrarModalConfirmacionAnyadir"
                                class="cancelConfi w-[50%]">Cancelar</button>
                            <button wire:click.prevent="guardarOportunidadManual"
                                class="confirmConfi w-[50%]">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalModificar)
        <div class="fixed inset-0 z-10" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificarTablet text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Modificar Interacción</h3>
                            <svg wire:click.prevent="cerrarModalModificar" class="hoverX cursor-pointer"
                                width="55" height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex flex-row mb-4">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Fecha:</label>
                                    <input wire:model="fecha_interaccion" type="date"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:ring-red-500" />
                                </div>
                                <div class="flex flex-col ml-10">
                                    <label class="labelsModal text-left">Medio contacto:</label>
                                    <input wire:model="medio_contacto" type="text"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg focus:ring-red-500" />
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="labelsModal text-left">Resumen contacto:</label>
                                <input wire:model="resumen_contacto" type="text"
                                    class="tamanyoInputExtraGrandeModales w-full p-2 border rounded-lg focus:ring-red-500" />
                            </div>
                            <div class="flex flex-row mb-4">
                                <div class="flex flex-col">
                                    <label class="labelsModal text-left">Resultado:</label>
                                    <input wire:model="resultado" type="text"
                                        class="tamanyoInputMedioModales w-full p-2 border rounded-lg focus:ring-red-500" />
                                </div>
                                <div class="flex flex-col ml-10">
                                    <label class="labelsModal text-left">Empresa:</label>
                                    <input wire:model="nombre_empresa" type="text"
                                        class="tamanyoInputMedioGrandeModales w-full p-2 border rounded-lg bg-gray-100"
                                        readonly />
                                </div>
                            </div>
                            <div class="flex flex-row justify-end mr-24">
                                <button wire:click.prevent="abrirModalConfirmacionModificar" type="button"
                                    class="botonEliminar flex items-center justify-center gap-2 px-4 py-2">
                                    Guardar
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.30957 14.3947L10.8096 15.8174L14.8096 12.0234" stroke="white"
                                            stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M10 6.14557H14C16 6.14557 16 5.19707 16 4.24857C16 2.35156 15 2.35156 14 2.35156H10C9 2.35156 8 2.35156 8 4.24857C8 6.14557 9 6.14557 10 6.14557Z"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M16 4.26562C19.33 4.43635 21 5.60301 21 9.93765V15.6286C21 19.4226 20 21.3196 15 21.3196H9C4 21.3196 3 19.4226 3 15.6286V9.93765C3 5.61249 4.67 4.43635 8 4.26562"
                                            stroke="white" stroke-width="2.1" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalConfirmacionModificar)
        <div class="fixed inset-0 z-20" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="cajaTxt mt-4">
                            <h3 class="cabeceraConfi m-4">¿Estás seguro de guardar estos cambios?</h3>
                            <h4 class="infoConfi">La siguiente acción guardará las modificaciones realizadas.</h4>
                        </div>
                        <div class="btnCaja flex flex-row">
                            <button wire:click.prevent="cerrarModalConfirmacionModificar" type="button"
                                class="cancelConfi w-[50%]">Cancelar</button>
                            <button wire:click.prevent="modificarInteraccion" type="submit"
                                class="confirmConfi w-[50%]">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalEliminar)
        <div class="fixed inset-0 z-10" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 blur-effect"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="cajaTxt mt-4">
                            <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres eliminarla?</h3>
                            <h4 class="infoConfi">La siguiente acción eliminará la interacción seleccionada.</h4>
                        </div>
                        <div class="btnCaja flex flex-row">
                            <button wire:click.prevent="cerrarModalEliminar"
                                class="cancelConfi w-[50%]">Cancelar</button>
                            <button wire:click.prevent="eliminarInteraccion"
                                class="confirmConfi w-[50%]">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
