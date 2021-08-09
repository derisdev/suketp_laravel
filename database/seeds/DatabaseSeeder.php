<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(AjuanSeeder::class);
        $this->call(KeperluanSeeder::class);
        $this->call(KadesSeeder::class);
        $this->call(PesanPenolakanSeeder::class);
        // $this->call(SktbSeeder::class);
        // $this->call(SkuSeeder::class);
    }
}
