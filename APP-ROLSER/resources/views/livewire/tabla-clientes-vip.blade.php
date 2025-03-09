<div>
    <div class="flex items-center justify-between">
        <div class="relative ml-28">
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
                placeholder="Buscar Cliente Vip..." id="searchInput">

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

        <button type="button" class="botonSecundario" wire:click.prevent="abrirModalAnyadir">Añadir Cliente Vip<svg
                width="26" height="28" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 9.69531H13.5" stroke="#af272f" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M9 14.4697V4.92969" stroke="#af272f" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg></button>
    </div>

    <!-- Tabla -->
    <div class="contenedorTablas">
        <table class="w-full text-sm text-center bg-white border-collapse bordeRolser tablaComercial">
            <thead class="text-xs uppercase color-cabecera-tabla-admin text-white font-bold">
                <tr>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser ">Representante</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser">Empresa</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser ">NIF</th>
                    <th scope="col" class="px-4 py-3 border-b bordeRolser ">Contacto</th>
                    <th class="px-4 py-3 border-b bordeRolser">Accion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientesVip as $clienteVip)
                    <tr class="border-b bordeRolser tamanyoCelda">
                        <td wire:click="abrirModalMostrar({{ $clienteVip->id_cliente_vip }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $clienteVip->cliente_nombre_representante }}&nbsp;{{ $clienteVip->cliente_apellidos_representante }}
                        </td>
                        <td wire:click="abrirModalMostrar({{ $clienteVip->id_cliente_vip }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $clienteVip->cliente_empresa }}</td>
                        <td wire:click="abrirModalMostrar({{ $clienteVip->id_cliente_vip }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">{{ $clienteVip->cliente_nif }}
                        </td>
                        <td wire:click="abrirModalMostrar({{ $clienteVip->id_cliente_vip }})"
                            class="px-4 py-3 tipografia-contenido-tabla-administrativo">
                            {{ $clienteVip->cliente_telefono_representante }}</td>
                        <td>
                            <div class="flex flex-row justify-center">
                                <button type="button" id="mostrarModalModificar" class="botonCrud mr-3 mb-2"
                                    wire:click.prevent="abrirModalModificar({{ $clienteVip->id_cliente_vip }})">Modificar
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
                                    wire:click.prevent="abrirModalEliminar({{ $clienteVip->cliente_vip }})">Eliminar<svg
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
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">No se encontraron resultados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="py-4 px-3 flex justify-center">
        <div class="inline-flex rounded-md shadow-sm">
            {{ $clientesVip->links('vendor.pagination.tailwind') }}
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
                        class="relative transform overflow-hidden cajaModalModificar text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Mostrar cliente Vip</h3>
                            <svg wire:click.prevent="cerrarModalMostrar" class="hoverX" width="55"
                                height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Datos representante:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="nombre_cte" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Nombre" readonly />
                                <input wire:model="apellidos_cte" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Apellidos" readonly />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Contacto:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="telefono_cte" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Ej: Tlf XXX-XXX-XXX" readonly />
                                <input wire:model="email_cte" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="correo@ejemplo.com" readonly />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Datos facturación:</h5>
                            </div>
                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Empresa:</label>
                                    </div>
                                    <input wire:model="empresa_cte" type="text" id="searchInput"
                                        class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre de la empresa" readonly />
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Dirección:</label>
                                    </div>
                                    <input wire:model="direccion_cte" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Dirección de la empresa" readonly />
                                </div>
                            </div>
                            <div class="flex flex-row mt-4">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">CIF:</label>
                                    </div>
                                    <input wire:model="nif_cte" type="text" id="searchInput"
                                        class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="CIF" readonly />
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">IBAN:</label>
                                    </div>
                                    <input wire:model="cuenta_bancaria" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nº de Cuenta" readonly />
                                </div>
                            </div>
                            <div class="flex flex-row mt-4">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Comercial:</label>
                                    </div>
                                    <input wire:model="id_comercial" type="text" id="searchInput"
                                        class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Dni Comercial" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modalAnyadir)
        <div class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
            <!-- Contenedor del modal -->
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaModalModificar text-center rounded-lg bg-white shadow-xl transition-all">
                        <div class="cabeceraModalModificar flex flex-row justify-between">
                            <h3 class="estilosTituloModalModificar">Nuevo cliente</h3>
                            <svg wire:click.prevent="cerrarModalAnyadir" class="hoverX" width="55"
                                height="55" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Datos representante:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="nombre_cte" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Nombre" />
                                <input wire:model="apellidos_cte" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Apellidos" />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Contacto:</h5>
                            </div>
                            <div class="flex flex-row">
                                <input wire:model="telefono_cte" type="text" id="searchInput"
                                    class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Ej: Tlf XXX-XXX-XXX" />
                                <input wire:model="email_cte" type="text" id="searchInput"
                                    class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="correo@ejemplo.com" />
                            </div>
                        </div>
                        <div class="flex flex-col cajaSeccionesModalMod">
                            <div class="flex">
                                <h5 class="seccionesModalModificar">Datos facturación:</h5>
                            </div>
                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Empresa:</label>
                                    </div>
                                    <input wire:model="empresa_cte" type="text" id="searchInput"
                                        class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre de la empresa" />
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Dirección:</label>
                                    </div>
                                    <input wire:model="direccion_cte" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Dirección de la empresa" />
                                </div>
                            </div>
                            <div class="flex flex-row mt-4">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">CIF:</label>
                                    </div>
                                    <input wire:model="nif_cte" type="text" id="searchInput"
                                        class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="CIF" />
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">IBAN:</label>
                                    </div>
                                    <input wire:model="cuenta_bancaria" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nº de Cuenta" />
                                </div>
                            </div>
                            <div class="flex flex-row mt-4">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <label class="labelsModal" for="">Comercial:</label>
                                    </div>
                                    <input wire:model="id_comercial" type="text" id="searchInput"
                                        class="tamanyoInputMedioGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Dni Comercial" />
                                </div>
                                <button wire:click.prevent="abrirModalConfirmacionAnyadir" type="button"
                                    class="botonEliminar margen-boton-anyadir">Añadir cliente<svg width="18"
                                        height="18" viewBox="0 0 18 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.5 9.69531H13.5" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 14.4697V4.92969" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($modalConfirmacionAnyadir)
            <div id="modalConfirmacionAnyadir" class="fixed inset-0 z-10" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="cajaTxt mt-4">
                                <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres añadirlo?</h3>
                                <h4 class="infoConfi">La siguiente acción creará un nuevo cliente.</h4>
                            </div>
                            <div class=" btnCaja flex flex-row">
                                <button wire:click.prevent="cerrarModalConfirmacionAnyadir"
                                    id="cancelarModalConfirmacionAnyadirVip"
                                    class="cancelConfi w-[50%]">Cancelar</button>
                                <button wire:click.prevent="anyadirCliente" id="confirmarModalConfirmacionAnyadirVip"
                                    class="confirmConfi w-[50%]">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($modalModificar)
        <div>
            <div id="modalModificar" class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <!-- Contenedor del modal -->
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden cajaModalModificar text-center rounded-lg bg-white shadow-xl transition-all">
                            <div class="cabeceraModalModificar flex flex-row justify-between">
                                <h3 class="estilosTituloModalModificar">Modificar cliente VIP</h3>
                                <svg wire:click.prevent="cerrarModalModificar" class="hoverX"
                                    id="ocultarModificarCancelarVip" width="55" height="55"
                                    viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#90242A"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <!-- Sección Datos representante -->
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos representante:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input wire:model="nombre_cte" type="text" name="nombre" id="nombre"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nombre" />

                                    <input wire:model="apellidos_cte" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Apellidos" />
                                </div>
                            </div>

                            <!-- Sección Contacto -->
                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Contacto:</h5>
                                </div>
                                <div class="flex flex-row">
                                    <input wire:model="telefono_cte" type="text" id="searchInput"
                                        class="tamanyoInputMedioModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Ej: Tlf XXX-XXX-XXX" />

                                    <input wire:model="email_cte" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="correo@ejemplo.com" />
                                </div>
                            </div>

                            <div class="flex flex-col cajaSeccionesModalMod">
                                <div class="flex">
                                    <h5 class="seccionesModalModificar">Datos de facturación:</h5>
                                </div>

                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <label for="direccion" class="labelsModal text-start">Empresa:</label>
                                        <input wire:model="empresa_cte" type="text" id="searchInput"
                                            class="tamanyoInputGrandeModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Nombre de la empresa" />
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <label class="labelsModal" for="">NIF:</label>
                                        </div>

                                        <input wire:model="nif_cte" type="text" id="searchInput"
                                            class="tamanyoInputPequenyoModales mr-5 w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="CIF" />

                                    </div>
                                </div>

                                <div class="flex flex-col mt-4">
                                    <label for="direccion" class="labelsModal text-start">Direccion:</label>
                                    <input wire:model="direccion_cte" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Dirección de la empresa" />
                                </div>
                            </div>

                            <div class="flex flex-row">
                                <div class="flex flex-col cajaSeccionesModalMod">
                                    <div class="flex">
                                        <label class="labelsModal" for="">IBAN:</label>
                                    </div>
                                    <input wire:model="cuenta_bancaria" type="text" id="searchInput"
                                        class="tamanyoInputGrandeModales w-full p-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Nº de Cuenta" />
                                </div>

                                <div class="flex flex-col cajaSeccionesModalMod ">
                                    <button wire:click.prevent="abrirModalConfirmacionModificar"
                                        id="mostrarModalConfirmacionGuardarVip" type="button"
                                        class="botonEliminar margen-boton-modificar ">
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
        </div>

        @if ($modalConfirmacionModificar)
            <!-- Modal de Confirmación -->
            <div id="modalConfirmacionGuardarCambiosVip" class="fixed inset-0 z-10" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="cajaTxt mt-4">
                                <h3 class="cabeceraConfi m-4">¿Estás seguro de guardar estos cambios?</h3>
                                <h4 class="infoConfi">La siguiente acción guardará las modificaciones
                                    realizadas.</h4>
                            </div>
                            <div class="btnCaja flex flex-row">
                                <button wire:click.prevent="cerrarModalConfirmacionModificar"
                                    id="cancelarModalConfirmacionGuardarVip" type="button"
                                    class="cancelConfi w-[50%]">
                                    Cancelar
                                </button>
                                <button wire:click.prevent="modificarCliente"
                                    id="confirmarModalConfirmacionGuardarVip" type="submit"
                                    class="confirmConfi w-[50%]">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($modalEliminar)
        <div id="modalConfirmacionEliminar" class="fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-black/50 transition-opacity blur-effect"></div>

            <!-- Contenedor del modal -->
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden cajaConfi text-center w-[25%] rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                        <div class="cajaTxt mt-4">
                            <h3 class="cabeceraConfi m-4">¿Estás seguro que quieres eliminarlo?</h3>
                            <h4 class="infoConfi">La siguiente acción eliminará al cliente seleccionado.
                            </h4>
                        </div>
                        <div class=" btnCaja flex flex-row">
                            <button wire:click.prevent="cerrarModalEliminar"
                                class="cancelConfi w-[50%]">Cancelar</button>
                            <button wire:click.prevent="eliminarCliente"
                                class="confirmConfi w-[50%]">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
