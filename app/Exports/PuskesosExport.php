<?php

namespace App\Exports;

use App\Puskesos;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PuskesosExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Puskesos $puskesos
     */
    public function map($puskesos): array
    {
        return [
            $puskesos->updated_at->format('d-m-y'),
            $puskesos->nosurat,
            $puskesos->user->nama,
            $puskesos->user->ttl,
            $puskesos->user->jk,
            $puskesos->user->alamat,
            $puskesos->keterangan,
        ];
    }

    public function query()
    {
        return Puskesos::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
