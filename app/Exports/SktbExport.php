<?php

namespace App\Exports;

use App\Sktb;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SktbExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Sktb $sktb
     */
    public function map($sktb): array
    {
        return [
            $sktb->updated_at->format('d-m-y'),
            $sktb->nosurat,
            $sktb->user->nama,
            $sktb->user->ttl,
            $sktb->user->jk,
            $sktb->user->alamat,
            $sktb->pemiliki,
            $sktb->memiliki,
            $sktb->lokasi,
            $sktb->luas,
        ];
    }

    public function query()
    {
        // return Sktb::query()->whereYear('created_at', $this->year);
        return Sktb::query()->where('acc', 1);
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
