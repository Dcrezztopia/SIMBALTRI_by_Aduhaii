<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratDanLaporan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajuan_surat')->insert([
            [
                'nama' => 'Supardi',
                'tanggal_lahir' => '2024-08-01',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'PNS',
                'alamat_rumah' => 'Jalan Raya',
                'kepentingan' => 'Penting',
                'perihal' => 'pengantar_domisili',
                'id_pembuat' => 1,
                'created_at' => '2024-08-01'
            ],
            [
                'nama' => 'Suparman',
                'tanggal_lahir' => '2024-08-01',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'PNS',
                'alamat_rumah' => 'Jalan Raya',
                'kepentingan' => 'Penting',
                'perihal' => 'pembuatan_KTP',
                'id_pembuat' => 3,
                'created_at' => '2024-08-01'
            ],
            [
                'nama' => 'Suparmin',
                'tanggal_lahir' => '2024-08-01',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'PNS',
                'alamat_rumah' => 'Jalan Raya',
                'kepentingan' => 'Penting',
                'perihal' => 'pembuatan_KTP',
                'id_pembuat' => 3,
                'created_at' => '2024-08-01'
            ]
        ]);
    }
}
