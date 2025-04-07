<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $compra->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
        }

        h1, h2 {
            margin-bottom: 10px;
        }

        .encabezado, .footer {
            text-align: center;
        }

        .cliente-info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .estado {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="encabezado">
        <h1>Factura #{{ $compra->id }}</h1>
        <p>Fecha de compra: {{ \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y') }}</p>
        <p>Fecha de envío estimada: {{ \Carbon\Carbon::parse($compra->fecha_envio_compra)->format('d/m/Y') }}</p>
    </div>

    <div class="cliente-info">
        <p><strong>Cliente:</strong> {{ $compra->usuario->nombre ?? 'N/A' }}</p>
        <p><strong>Estado de la compra:</strong> {{ ucfirst($compra->estado_compra) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio unitario (€)</th>
                <th>Cantidad</th>
                <th>Subtotal (€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles_compra as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre_producto ?? 'Producto eliminado' }}</td>
                    <td>{{ number_format($detalle->precio_producto_detalles, 2) }}</td>
                    <td>{{ $detalle->cantidad_producto_detalles }}</td>
                    <td>{{ number_format($detalle->subtotal_detalles, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total de la compra: {{ number_format($compra->total_compra, 2) }} €
    </div>

</body>
</html>