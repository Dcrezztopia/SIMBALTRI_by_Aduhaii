<?php

namespace Database\Seeders;

use App\Models\KegiatanWarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanDanIuran extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_warga')->insert([
            [
                'nama_kegiatan' => 'Kerja Bakti',
                'tanggal_pelaksanaan' => '2024-08-01',
                'tempat_pelaksanaan' => 'Jalan Raya',
                'penanggung_jawab' => '3308084304880001'
            ],
            [
                'nama_kegiatan' => 'Posyandu',
                'tanggal_pelaksanaan' => '2024-08-02',
                'tempat_pelaksanaan' => 'Balai RW',
                'penanggung_jawab' => '3308081204870007'
            ],
            [
                'nama_kegiatan' => 'Senam Sehat',
                'tanggal_pelaksanaan' => '2024-08-03',
                'tempat_pelaksanaan' => 'Lapangan RW',
                'penanggung_jawab' => '3308083112870007'
            ]
        ]);
    }
}
