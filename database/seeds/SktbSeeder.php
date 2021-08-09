<?php

use App\Sktb;
use Illuminate\Database\Seeder;

class SktbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sktb::create([
            'user_id' => 1,
            'jenis' => 'Surat Keterangan Tanah Bangunan',
            'keterangan' => 'Untuk keperluan jual tanah',
            'pemilik' => 'Jajang Sutisna',
            'memiliki' => 'Tanah',
            'lokasi' => 'Bumi Atlet',
            'luas' => '3 x 5 m',
            'harga' => '12.000.000',
        ]);
    }
}
