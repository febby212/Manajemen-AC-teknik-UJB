<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class HistoryExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithColumnFormatting, WithStyles
{
    private Collection $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Kode AC',
            'Merek AC',
            'Kondisi',
            'Kelengkapan',
            'Ruangan',
            'Deskripsi Kondisi',
            'Kerusakan',
            'Perbaikan',
            'POS Anggaran',
            'Tanggal Perbaikan',
            'Pejabat Pengguna Anggaran',
            'Biaya',
            'Mengetahui',
            'Menyetujui'
        ];
    }

    public function map($row): array
    {
        $tgl_perbaikan = $row->tgl_perbaikan ? Carbon::parse($row->tgl_perbaikan)->locale('id')->isoFormat('dddd, D MMMM YYYY') : 'N/A';

        return [
            $row->acDesc->kode_AC ?? 'N/A',
            ($row->acDesc->merekAC->merek ?? 'N/A') . '-' . ($row->acDesc->merekAC->seri ?? 'N/A'),
            $row->acDesc->kondisi ?? 'N/A',
            $row->acDesc->kelengkapan ?? 'N/A',
            $row->acDesc->ruangan ?? 'N/A',
            $row->acDesc->desc_kondisi ?? 'N/A',
            $row->kerusakan ?? 'N/A',
            $row->perbaikan ?? 'N/A',
            $row->pos_anggaran ?? 'N/A',
            $tgl_perbaikan,
            $row->PPA ?? 'N/A',
            $row->biaya ?? 'N/A',
            $row->mengetahui ?? 'N/A',
            $row->menyetujui ?? 'N/A',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Mengatur auto size untuk kolom A hingga N
                foreach (range('A', 'N') as $column) {
                    $sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }

                // Mengatur warna heading
                $sheet->getDelegate()->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'], // White color for text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FF4154F1', // Background color
                        ],
                    ],
                ]);
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Set styles for headings row
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // White color for text
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FF4154F1', // Background color
                    ],
                ],
            ],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,  // Kolom 'Tanggal Perbaikan' dengan format tanggal
        ];
    }
}
