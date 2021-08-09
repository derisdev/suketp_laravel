<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'nama' => 'Super Admin',
            'nik' => '1187050030',
            'no_kk' => '1187050000',
            'ttl' => 'Bandung, 8 September 1999',
            'agama' => 'Islam',
            'jk' => 'Perempuan',
            'status' => 'Belum Menikah',
            'ayah' => 'Mamang Supriatna',
            'ibu' => 'sumenep',
            'pendidikan' => 'Sarjana S1',
            'pekerjaan' => 'Programmer',
            'rt' => '11',
            'rw' => '15',
            'alamat' => 'Permata Biru, Blok R.10, RT.11 RW.15 Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $superadmin->assignRole('superadmin');

        $admin1 = User::create([
            'nama' => 'Petugas Desa A',
            'nik' => '1187050031',
            'no_kk' => '1187050000',
            'ttl' => 'Bandung, 8 September 1998',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'status' => 'Belum Menikah',
            'ayah' => 'Mamang Supriatna',
            'ibu' => 'sumenep',
            'pendidikan' => 'Sarjana S1',
            'pekerjaan' => 'Pegawai Desa',
            'rt' => '11',
            'rw' => '15',
            'alamat' => 'Permata Biru, Blok R.10, RT.11 RW.15 Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $admin1->assignRole('admin');

        $admin2 = User::create([
            'nama' => 'Petugas Desa B',
            'nik' => '1187050032',
            'no_kk' => '1187050000',
            'ttl' => 'Bandung, 8 September 1997',
            'agama' => 'Islam',
            'jk' => 'Perempuan',
            'status' => 'Menikah',
            'ayah' => 'Mamang Supriatna',
            'ibu' => 'sumenep',
            'pendidikan' => 'Sarjana S1',
            'pekerjaan' => 'Pegawai Desa',
            'rt' => '11',
            'rw' => '15',
            'alamat' => 'Permata Biru, Blok R.10, RT.11 RW.15 Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $admin2->assignRole('admin');

        $user1 = User::create([
            'nama' => 'Penduduk A',
            'nik' => '1187050033',
            'no_kk' => '11870500001',
            'ttl' => 'Bandung, 8 September 1996',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'status' => 'Menikah',
            'ayah' => 'Wawan Supriatna',
            'ibu' => 'Cici Sarici',
            'pendidikan' => 'SLTA/Sederajat',
            'pekerjaan' => 'Wirausaha',
            'rt' => '10',
            'rw' => '15',
            'alamat' => 'Permata Biru, Blok R.10, RT.11 RW.15 Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'nama' => 'Penduduk B',
            'nik' => '1187050034',
            'no_kk' => '11870500001',
            'ttl' => 'Bandung, 8 September 1997',
            'agama' => 'Islam',
            'jk' => 'Perempuan',
            'status' => 'Belum Menikah',
            'ayah' => 'Jajang Jamilah',
            'ibu' => 'Mimin Suminip',
            'pendidikan' => 'SLTA/Sederajat',
            'pekerjaan' => 'Mahasiswa',
            'rt' => '9',
            'rw' => '15',
            'alamat' => 'Permata Biru, Blok R.10, RT.11 RW.15 Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat',
            'kewarganegaraan' => 'Indonesia',
            'password' => bcrypt('password'),
        ]);
        $user2->assignRole('user');


        Permission::create(['name' => 'setingumum']);
        Permission::create(['name' => 'lengkap']);
        $superadmin = Role::find(1);
        $admin = Role::find(2);
        $superadmin->givePermissionTo('setingumum');
        $admin->givePermissionTo('setingumum');
    }
}
