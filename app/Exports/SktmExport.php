<?php

namespace App\Exports;

use App\Sktm;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SktmExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Sktm $sktm
     */
    public function map($sktm): array
    {
        return [
            $sktm->updated_at->format('d-m-y'),
            $sktm->nosurat,
            $sktm->user->nama,
            $sktm->user->ttl,
            $sktm->user->jk,
            $sktm->user->alamat,
            $sktm->nama_anak,
            // $sktm->nik_anak,
            $sktm->sekolah,
            $sktm->kelas,
        ];
    }

    public function query()
    {
        return Sktm::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
