<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Usuario;
use App\Models\DetalleVenta;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{ 
    public function dashboard()
    {
        // Cantidad total de productos vendidos (suma de cantidades en DetalleVenta)
        $productosVendidos = DetalleVenta::sum('cantidad');

        // Cantidad total de clientes (usuarios con rol cliente, o todos si no tienes roles)
        $clientes = Venta::count();

        // Ventas por mes (ejemplo: últimos 6 meses)
        $ventasPorMes = Venta::selectRaw('MONTH(fecha_registro) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        // Etiquetas de meses (puedes personalizarlo para mostrar nombres en español)
        $meses = ['1' => 'Ene', '2' => 'Feb', '3' => 'Mar', '4' => 'Abr', '5' => 'May', '6' => 'Jun', '7' => 'Jul', '8' => 'Ago', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'];
        $labels = [];
        $data = [];
        foreach (range(1, 12) as $i) {
            $labels[] = $meses[$i];
            $data[] = isset($ventasPorMes[$i]) ? $ventasPorMes[$i] : 0;
        }

        // Ventas de hoy
        $ventasHoy = Venta::whereDate('fecha_registro', now()->toDateString())->sum('total');

        // Ventas de ayer
        $ventasAyer = Venta::whereDate('fecha_registro', now()->subDay()->toDateString())->sum('total');

        // Porcentaje de cambio
        $cambioPorcentaje = $ventasAyer > 0 ? round((($ventasHoy - $ventasAyer) / $ventasAyer) * 100, 2) : 100;

        // Ventas diarias últimos 15 días
        $ventasDiarias = Venta::selectRaw('DATE(fecha_registro) as fecha, SUM(total) as total')
            ->where('fecha_registro', '>=', now()->subDays(14))
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->pluck('total', 'fecha')
            ->toArray();

        return Inertia::render('Dashboard', [
            'productosVendidos' => $productosVendidos,
            'clientes' => $clientes,
            'ventasPorMesLabels' => $labels,
            'ventasPorMesData' => $data,
            'ventasHoy' => $ventasHoy,
            'ventasAyer' => $ventasAyer,
            'cambioPorcentaje' => $cambioPorcentaje,
            'ventasDiariasLabels' => array_keys($ventasDiarias),
            'ventasDiariasData' => array_values($ventasDiarias),
        ]);
    }
}