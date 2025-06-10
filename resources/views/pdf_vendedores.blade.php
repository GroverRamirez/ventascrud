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
    <h2>Reporte de Vendedores</h2>
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Vendedor</th>
                <th>Cantidad de Ventas</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendedores as $vendedor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vendedor->usuario ? $vendedor->usuario->nombre : 'Sin nombre' }}</td>
                <td>{{ $vendedor->cantidad }}</td>
                <td>{{ number_format($vendedor->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Suma total: {{ $total }} Bs.</h3>
</body>
</html>