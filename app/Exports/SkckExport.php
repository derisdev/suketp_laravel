<?php

namespace App\Exports;

use App\Skck;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SkckExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Skck $skck
     */
    public function map($skck): array
    {
        return [
            $skck->updated_at->format('d-m-y'),
            $skck->nosurat,
            $skck->user->nama,
            $skck->user->ttl,
            $skck->user->jk,
            $skck->user->alamat,
            $skck->klarifikasi,
        ];
    }

    public function query()
    {
        return Skck::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
