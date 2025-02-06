@extends('layouts.app')

@push('styles')
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- DataTables TailwindCSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.tailwindcss.css">

<!-- 🔹 Personalización de DataTables -->
<style>
    /* Quitar el efecto striped */
    table.dataTable.stripe tbody tr:nth-child(odd),
    table.dataTable.display tbody tr:nth-child(odd) {
        background-color: white !important;
    }

    /* Ajustar color de hover */
    table.dataTable tbody tr:hover {
        background-color: #fde8e8 !important; /* Rojo suave */
    }

    /* Cambiar color del paginador */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: #dc2626 !important; /* Rojo */
        color: white !important;
        border-radius: 6px;
        padding: 6px 12px;
        margin: 2px;
        transition: all 0.3s ease-in-out;
    }

    /* Cambiar color cuando se pasa el mouse */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #b91c1c !important; /* Rojo más oscuro */
    }

    /* Quitar color de fondo de botones inactivos */
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        background-color: #f3f4f6 !important; /* Gris */
        color: #9ca3af !important;
    }

    /* Personalizar el campo de búsqueda */
    .dataTables_filter input {
        border: 2px solid #dc2626 !important; /* Rojo */
        border-radius: 6px;
        padding: 6px 10px;
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    /* Cambiar borde cuando se enfoca */
    .dataTables_filter input:focus {
        border-color: #b91c1c !important; /* Rojo más oscuro */
        box-shadow: 0 0 8px rgba(220, 38, 38, 0.5);
    }
</style>
@endpush

@section('content')
{{-- seccion del contenido --}}
<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <table id="tabla" class="order-column hover row-border border border-red-500 rounded-lg">
            <thead>
                <tr class="bg-red-600 text-white text-center uppercase text-sm">
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Teléfono</th>
                    <th class="py-3 px-4 text-left">Departamento</th>
                    <th class="py-3 px-4 text-left">Email</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.tailwindcss.js"></script>

<script>
$(document).ready(function() {
    new DataTable('#tabla', {
        ajax: {
            url: "/api/administrativos",
            type: "GET",
            dataSrc: ""
        },
        columns: [
            { data: "administrativo_nombre" },
            { data: "administrativo_telefono" },
            { data: "administrativo_departamento" },
            { data: "administrativo_email" }
        ],

        language: {
            url: '//cdn.datatables.net/plug-ins/2.2.1/i18n/es-ES.json',
        },
        paging: true,
        searching: true,
        ordering: true,
        info: false,
        createdRow: function(row) {
            $(row).addClass('hover:bg-red-100 transition-all');
        }
    });
});
</script>

