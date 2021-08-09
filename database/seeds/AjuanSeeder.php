<?php

use App\Sk;
use App\Sku;
use App\Ajuan;
use App\BedaNama;
use App\Domisili;
use App\Kehilangan;
use App\KtpExpire;
use App\Penghasilan;
use Illuminate\Database\Seeder;

class AjuanSeeder extends Seeder
{
    public function run()
    {
        // $kehilangan = Ajuan::create([
        //     'user_id' => 1,
        //     'jenis' => 'Surat Kehilangan',
        //     'keterangan' => 'untuk di laporkan ke polres',
        // ]);
        // $tgl = date('Y-m-d');
        // Kehilangan::create([
        //     'ajuan_id' => $kehilangan->id,
        //     'barang' => 'HP',
        //     'lokasi' => 'Bandung',
        //     'tanggal' => $tgl,
        // ]);

        $penghasilan = Ajuan::create([
            'user_id' => 1,
            'jenis' => 'Surat Penghasilan',
            'keterangan' => 'untuk kelengkapan administrasi',
        ]);
        Penghasilan::create([
            'ajuan_id' => $penghasilan->id,
            'besar' => '12.000.000',
        ]);

        // $bedaNama = Ajuan::create([
        //     'user_id' => 1,
        //     'jenis' => 'Surat Keterangan Beda Nama',
        //     'keterangan' => 'untuk kelengkapan administrasi',
        // ]);
        // BedaNama::create([
        //     'ajuan_id' => $bedaNama->id,
        //     'dokumen_salah' => 'KTP',
        //     'perbedaan' => '12.000.000',
        //     'perbedaan' => '12.000.000',
        //     'perbedaan' => '12.000.000',
        // ]);


        // $ktpexpire = Ajuan::create([
        //     'user_id' => 1,
        //     'jenis' => 'Surat KTP Expire',
        //     'keterangan' => 'untuk mengajukan E-KTP baru',
        // ]);
        // KtpExpire::create([
        //     'ajuan_id' => $ktpexpire,
        //     'noblanko' => '1938473892',
        //     'masa' => $tgl,
        // ]);
    }
}
