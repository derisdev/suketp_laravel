<?php

namespace App\Exports;

use App\Sku;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SkuExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Sku $sku
     */
    public function map($sku): array
    {
        return [
            $sku->updated_at->format('d-m-y'),
            $sku->nosurat,
            $sku->user->nama,
            $sku->user->ttl,
            $sku->user->jk,
            $sku->user->alamat,
            $sku->nama_usaha,
            $sku->alamat_usaha,
        ];
    }

    public function query()
    {
        return Sku::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
