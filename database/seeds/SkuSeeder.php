<?php

use App\Sku;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sku::create([
            'user_id' => 1,
            'jenis' => 'Surat Keterangan Usaha',
            'keterangan' => 'Untuk keperluan administrasi',
            'nama_usaha' => 'Keripik Emping Jagung',
            'alamat_usaha' => 'Bandung',
        ]);
    }
}
