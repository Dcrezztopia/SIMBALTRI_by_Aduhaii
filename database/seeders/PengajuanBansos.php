<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanBansos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO
                pengajuan_bansos (
                    nama,
                    nik,
                    no_kk,
                    kondisi_rumah,
                    luas_rumah,
                    status_pernikahan,
                    pekerjaan,
                    jml_tanggungan,
                    jml_pendapatan,
                    tag_listrik,
                    tag_air
                )
            VALUES
                ('NURHANDOKO', '3308082611850003', '3308083105110005', 'BURUK', 960, 'MENIKAH', 'Petani', 2, 2500000, 0, 150000),
                ('SUTAR', '3308082108870004', '3308080710130008', 'SEMPURNA', 750, 'JANDA/DUDA', 'Wiraswasta', 2, 2800000, 250000, 300000),
                ('KUNDARYANTI', '3308084602860006', '3308080710130008', 'BAIK', 5200, 'JANDA/DUDA', 'Tidak Bekerja', 5, 2700000, 0, 80000),
                ('BAMBANG SETYAWAN', '3308082511850003', '3308081309130002', 'SEMPURNA', 1800, 'BELUM/TIDAK', 'Buruh Harian Lepas', 5, 3000000, 0, 670000),
                ('ANTON', '3308081605900004', '3308081106130005', 'LAYAK', 8800, 'JANDA/DUDA', 'Tidak Bekerja', 6, 3100000, 2100000, 1000000),
                ('LINDA REGINA', '3308085609870001', '3308082502075280', 'LAYAK', 5900, 'BELUM/TIDAK', 'Tidak Bekerja', 5, 4000000, 350000, 100000),
                ('MARIANA DEWI', '3308085812880002', '3308082502075280', 'SEMPURNA', 3300, 'BELUM/TIDAK', 'Pedagang', 1, 1300000, 130000, 1300000),
                ('YANI AGUNG SUBIYANTO', '3308082907870002', '3308082502074068', 'SEMPURNA', 7100, 'MENIKAH', 'PNS', 3, 1400000, 130000, 90000),
                ('YUDI DANIAMI', '3308082804900001', '3308082502074068', 'SEMPURNA', 1000, 'BELUM/TIDAK', 'Petani', 9, 2900000, 1100000, 350000),
                ('DEVI MARVIANA', '3308076003890007', '3308082502074829', 'BAIK', 1000, 'MENIKAH', 'Tidak Bekerja', 6, 2900000, 670000, 130000),
                ('APRIANI', '3308084304880001', '3308082502074563', 'LAYAK', 6010, 'MENIKAH', 'Polri', 1, 4100000, 0, 2100000),
                ('FITRIYA ZAKIYAH', '3308086005870001', '3308081410140005', 'BURUK', 1500, 'BELUM/TIDAK', 'Pedagang', 10, 1300000, 500000, 500000),
                ('MOHAMMAD YULIANTO', '3616082007880006', '3308081111140005', 'BAIK', 8900, 'MENIKAH', 'Pedagang', 1, 3000000, 670000, 280000),
                ('DIAN KUKUH PURNANDI', '3308082107880001', '3308082502073931', 'BAIK', 2900, 'BELUM/TIDAK', 'Tidak Bekerja', 5, 1300000, 0, 120000),
                ('JASMAN DONI PUTRA', '3308081204870007', '3308081311140003', 'SEMPURNA', 6900, 'JANDA/DUDA', 'Petani', 2, 1900000, 650000, 130000),
                ('ISROIBIN', '3308080509870002', '3308081407120009', 'SEMPURNA', 940, 'MENIKAH', 'Tidak Bekerja', 2, 1100000, 500000, 790000),
                ('PUJI MULYO NUGROHO', '3308082807870001', '3308082502076271', 'SEMPURNA', 880, 'MENIKAH', 'Pedagang', 3, 3500000, 80000, 1100000),
                ('ROHMAT ARIFUDIN', '3308080506880001', '3308082502074515', 'BAIK', 5100, 'MENIKAH', 'Wiraswasta', 4, 5100000, 1200000, 700000),
                ('ANDRIYANTO', '3308083112870007', '3308081607130008', 'BURUK', 4900, 'BELUM/TIDAK', 'Pedagang', 9, 3000000, 0, 220000),
                ('SASONGJKO WIDHYATMAJA', '3308080104890002', '3308080504100006', 'SEMPURNA', 6700, 'JANDA/DUDA', 'Tidak Bekerja', 4, 3000000, 700000, 1200000),
                ('BUDI HARTANTO', '3308080209850002', '3308081005100027', 'SEMPURNA', 7600, 'MENIKAH', 'Buruh Harian Lepas', 3, 3000000, 120000, 2000000),
                ('ROCHMIYATI', '3308084501890003', '3308081005100027', 'LAYAK', 2010, 'BELUM/TIDAK', 'Pedagang', 10, 2700000, 0, 2700000),
                ('QONITA AFGAN', '3308086208890001', '3308082502076289', 'LAYAK', 5600, 'JANDA/DUDA', 'Buruh Harian Lepas', 2, 3200000, 2700000, 1500000),
                ('NANANG SUSANTO', '3308082408850001', '3308081707130001', 'LAYAK', 8000, 'JANDA/DUDA', 'Pedagang', 1, 1500000, 660000, 550000),
                ('LILIK HERAWATI', '3308086709880001', '3308081707130001', 'SEMPURNA', 9900, 'BELUM/TIDAK', 'Polri', 9, 1500000, 80000, 1000000),
                ('PRADEWI', '3308085012880002', '3308082901150002', 'SEMPURNA', 7200, 'MENIKAH', 'Pedagang', 6, 1000000, 90000, 650000),
                ('HILDA DINIARTI', '3308084712860006', '3308081205110001', 'BURUK', 7500, 'JANDA/DUDA', 'Pedagang', 7, 3000000, 1000000, 660000),
                ('AHMAD RIZA SUSANTO', '3308081805880001', '3308082803110015', 'LAYAK', 5900, 'JANDA/DUDA', 'Pedagang', 5, 2700000, 0, 90000),
                ('NURIYAH', '3308085906860002', '3308082803110015', 'BAIK', 9200, 'JANDA/DUDA', 'PNS', 3, 3100000, 700000, 2500000),
                ('NURFITRIANA', '3308084505890003', '3308082502074080', 'SEMPURNA', 5400, 'JANDA/DUDA', 'Tidak Bekerja', 4, 3100000, 220000, 25000)
            ;
        ");
    }
}
