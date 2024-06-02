<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $data = [
                [
                    'nik' => '3308080305870001',
                    'no_kk' => '3308082502075965',
                    'nama' => 'AHMAD ARIFIN',
                    'alamat_rumah' => 'JL. PAHLAWAN V B1/22',
                    'RT' => '01',
                    'jenis_kelamin' => 'L',
                    'agama' => 'ISLAM',
                    'tanggal_lahir' => '1996-04-21',
                    'tempat_lahir' => 'MALANG',
                    'pendidikan' => 'SLTP/SLTA SEDERAJAT',
                    'pekerjaan' => 'KARYAWAN SWASTA',
                    'status_pernikahan' => 'MENIKAH',
                    'status_penduduk' => 'T',
                ]
        ];
        DB::table('data_warga')->insert($data);
    }
}
