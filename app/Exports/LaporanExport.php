<?php

namespace App\Exports;

use App\Ajuan;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Ajuan $ajuan
     */
    public function map($ajuan): array
    {
        return [
            $ajuan->updated_at->format('d-m-y'),
            $ajuan->jenis,
            $ajuan->nosurat,
            $ajuan->user->nama,
            $ajuan->user->ttl,
            $ajuan->user->jk,
            $ajuan->user->alamat,
        ];
    }

    public function query()
    {
        // return Ajuan::query()->whereYear('created_at', $this->year);
        return Ajuan::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            // 1    => ['font' => ['bold' => true]],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
