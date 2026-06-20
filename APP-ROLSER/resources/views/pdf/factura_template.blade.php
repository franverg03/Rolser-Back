<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $factura->pedido?->codigo_Pedido ?? 'Sin pedido' }}</title>
    <style>
        body {
            color: #333;
            line-height: 1.5;
        }

        .invoice-header {
            border-bottom: 2px solid #AF272F;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .row {
            display: table;
            width: 100%;
        }

        .col {
            display: table-cell;
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }

        .invoice-title {
            color: #AF272F;
            font-size: 28px;
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .table th {
            background-color: #cf333f;
            color: white;
            padding: 10px;
            text-align: left;
        }

        .table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .total-section {
            margin-top: 30px;
            text-align: right;
            font-size: 18px;
        }

        .total-box {
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <div class="row">
            <div class="col">
                <div class="invoice-title">ROLSER</div>
                <p><strong>Pedido:</strong> {{ $factura->pedido?->codigo_Pedido ?? 'Sin pedido' }}</p>
                <p><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</p>
                <p><strong>NIF:</strong>A03066909</p>
            </div>
            <div class="col" style="text-align: left; padding-left: 350px;">
                <h2 style="color: #AF272F;">
                    @if ($factura->id_cliente_no_vip)
                        {{ $factura->clienteNoVip->cliente_empresa }}
                    @else
                        {{ $factura->clienteVip->cliente_empresa ?? 'Cliente VIP' }}
                    @endif
                </h2>
                <p><strong>NIF:</strong>
                    @if ($factura->id_cliente_no_vip)
                        {{ $factura->clienteNoVip->cliente_nif }}
                    @else
                        {{ $factura->clienteVip->cliente_nif ?? 'Cliente VIP' }}
                    @endif
                </p>

                <p><strong>Dirección:</strong>
                    @if ($factura->id_cliente_no_vip)
                        {{ $factura->clienteNoVip->cliente_direccion_empresa }}
                    @else
                        {{ $factura->clienteVip->cliente_direccion_empresa ?? 'Cliente VIP' }}
                    @endif
                </p>

                <p><strong>Representante:</strong>
                    @if ($factura->id_cliente_no_vip)
                        {{ $factura->clienteNoVip->cliente_nombre_representante }}
                        {{ $factura->clienteNoVip->cliente_apellidos_representante }}
                    @else
                        {{ $factura->clienteVip->cliente_nombre_representante ?? 'Cliente VIP' }}
                        {{ $factura->clienteVip->cliente_apellidos_representante ?? 'Cliente VIP' }}
                    @endif
                </p>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero</th>
                <th>Cant.</th>
                <th>Precio Ud.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factura->lineasDeFactura as $linea)
                <tr>
                    <td>{{ $linea->producto->producto_nombre }}</td>
                    <td>{{ $linea->producto->id_producto }}</td>
                    <td>{{ $linea->unidades }}</td>
                    <td>{{ number_format($linea->importe, 2, ',', '.') }}€</td>
                    <td>{{ number_format($linea->total, 2, ',', '.') }}€</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-section">
        <div class="total-box">
            <strong>Total Factura:</strong>
            <span style="color: #AF272F; font-weight: bold;">
                {{ number_format($factura->factura_importe_total, 2, ',', '.') }}€
            </span>
        </div>
    </div>
</body>

</html>
