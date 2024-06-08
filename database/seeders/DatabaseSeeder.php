<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()
            ->createMany([
                [
                    'username' => 'ikan',
                    'nama' => 'ikan',
                    'no_telp' => '000000000',
                    'role' => 'admin',
                    'password' => bcrypt('12345')
                ],
                // [
                //     'username' => 'budi',
                //     'role' => 'user',
                //     'password' => bcrypt('12345')
                // ],
                [
                    'username' => 'warga',
                    'nama' => 'warga',
                    'no_telp' => '089512392133',
                    'role' => 'warga',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'admin',
                    'nama' => 'Pengguna Terhormat',
                    'no_telp' => '1',
                    'role' => 'admin',
                    'password' => bcrypt('12345')
                ],
            [
                    'username' => 'amdAr',
                    'nama' => 'AHMAD ARIFIN',
                    'no_telp' => '085190902122',
                    'role' => 'warga',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'laiNur',
                    'nama' => 'LAILA NURUL HIKMAH',
                    'no_telp' => '081221960678',
                    'role' => 'admin',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'madMun1',
                    'nama' => 'AHMAD MUNTAHA',
                    'no_telp' => '082245121230',
                    'role' => 'ketua_rw',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'winarti03',
                    'nama' => 'WINARTI ',
                    'no_telp' => '081254362413',
                    'role' => 'sekretaris_rw',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'maeDah11',
                    'nama' => 'MAEDA DAHLIA',
                    'no_telp' => '085968519451',
                    'role' => 'bendahara_rw',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'sigitGans',
                    'nama' => 'TRI SIGIT WAHYUDI',
                    'no_telp' => '085109695676',
                    'role' => 'ketua_rt',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'ernaCans',
                    'nama' => 'ERNA SETYO YULIANI',
                    'no_telp' => '081278915324',
                    'role' => 'sekretaris_rt',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'zusecha07',
                    'nama' => 'ANA ZUSECHA ',
                    'no_telp' => '082255124564',
                    'role' => 'bendahara_rt',
                    'password' => bcrypt('12345')
                ],

            ]);
        $this->call([
            DataWargaSeeder::class,
            PengajuanBansos::class,
            KriteriaBansos::class,
            KriteriaMappedScore::class,
            PerbandinganKriteriaBansos::class
        ]);


    }
}
