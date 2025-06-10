<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientesExport implements FromCollection, WithHeadings, WithStyles
{
    protected $busqueda;

    public function __construct($busqueda)
    {
        $this->busqueda = $busqueda;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Venta::query();
        if ($this->busqueda) {
            $query->where('cliente_nombre', 'like', '%' . $this->busqueda . '%');
        }
        return $query->select('cliente_nombre', \DB::raw('COUNT(*) as cantidad'), \DB::raw('SUM(total) as total'))
            ->groupBy('cliente_nombre')
            ->get();
    }

    public function headings(): array
    {
        return ['Cliente', 'Cantidad de Compras', 'Total Gastado'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:C1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D9D9D9']
            ],
            'alignment' => ['horizontal' => 'center']
        ]);
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle("A1:C{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ]);
        foreach (range('A', 'C') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        return [];
    }
}
