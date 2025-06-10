<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Reporte de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Cliente</th>
                <th>Cantidad de Compras</th>
                <th>Total Gastado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cliente->cliente_nombre }}</td>
                <td>{{ $cliente->cantidad }}</td>
                <td>{{ number_format($cliente->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Suma total: {{ $total }} Bs.</h3>
</body>
</html>