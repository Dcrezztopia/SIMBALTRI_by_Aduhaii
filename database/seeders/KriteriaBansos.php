<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaBansos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

// INSERT INTO kriteria_bansos
//     (id, nama, jenis, jenis_score, table_name, column_name)
// VALUES
//     (1, 'Kelayakan Tempat Tinggal','benefit','fixed','pengajuan_bansos', 'kondisi_rumah'),
//     (2, 'Luas Bangunan','cost','range','pengajuan_bansos', 'luas_rumah'),
//     (3, 'Status Pernikahan','benefit','fixed','pengajuan_bansos', 'status_pernikahan'),
//     (4, 'Pekerjaan','cost','fixed','pengajuan_bansos', 'pekerjaan'),
//     (5, 'Tanggungan','benefit','range','pengajuan_bansos', 'jml_tanggungan'),
//     (6, 'Total Pendapatan','cost','range','pengajuan_bansos', 'jml_pendapatan'),
//     (7, 'Tagihan Listrik','benefit','range','pengajuan_bansos', 'tag_listrik'),
//     (8, 'Tagihan Air','benefit','range','pengajuan_bansos', 'tag_air')
// ;
        DB::table('kriteria_bansos')->insert([
            [
                'id' => 1,
                'nama' => 'Kelayakan Tempat Tinggal',
                'jenis' => 'benefit',
                'jenis_score' => 'fixed',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'kondisi_rumah'
            ],
            [
                'id' => 2,
                'nama' => 'Luas Bangunan',
                'jenis' => 'cost',
                'jenis_score' => 'range',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'luas_rumah'
            ],
            [
                'id' => 3,
                'nama' => 'Status Pernikahan',
                'jenis' => 'benefit',
                'jenis_score' => 'fixed',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'status_pernikahan'
            ],
            [
                'id' => 4,
                'nama' => 'Pekerjaan',
                'jenis' => 'cost',
                'jenis_score' => 'fixed',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'pekerjaan'
            ],
            [
                'id' => 5,
                'nama' => 'Tanggungan',
                'jenis' => 'benefit',
                'jenis_score' => 'range',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'jml_tanggungan'
            ],
            [
                'id' => 6,
                'nama' => 'Total Pendapatan',
                'jenis' => 'cost',
                'jenis_score' => 'range',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'jml_pendapatan'
            ],
            [
                'id' => 7,
                'nama' => 'Tagihan Listrik',
                'jenis' => 'benefit',
                'jenis_score' => 'range',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'tag_listrik'
            ],
            [
                'id' => 8,
                'nama' => 'Tagihan Air',
                'jenis' => 'benefit',
                'jenis_score' => 'range',
                'table_name' => 'pengajuan_bansos',
                'column_name' => 'tag_air'
            ]
        ]);
    }
}
