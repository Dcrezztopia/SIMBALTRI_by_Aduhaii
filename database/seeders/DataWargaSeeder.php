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
        // $data = [
        //         [
        //             'nik' => '3308080305870001',
        //             'no_kk' => '3308082502075965',
        //             'nama' => 'AHMAD ARIFIN',
        //             'alamat_rumah' => 'JL. PAHLAWAN V B1/22',
        //             'RT' => '01',
        //             'jenis_kelamin' => 'L',
        //             'agama' => 'ISLAM',
        //             'tanggal_lahir' => '1996-04-21',
        //             'tempat_lahir' => 'MALANG',
        //             'pendidikan' => 'SLTP/SLTA SEDERAJAT',
        //             'pekerjaan' => 'KARYAWAN SWASTA',
        //             'status_pernikahan' => 'MENIKAH',
        //             'status_penduduk' => 'T',
        //         ]
        // ];
        // DB::table('data_warga')->insert($data);
        DB::insert("
            INSERT INTO
                data_warga (
                    nik,
                    no_kk,
                    nama,
                    alamat_rumah,
                    RT,
                    jenis_kelamin,
                    agama,
                    tanggal_lahir,
                    tempat_lahir,
                    pendidikan,
                    pekerjaan,
                    status_pernikahan,
                    status_penduduk
                )
            VALUES
                ('3308082611850003' ,'3308083105110005' ,'NURHANDOKO'   ,'NGLAWISAN'    ,'01' ,'L' ,'AGAMA' ,'1995-06-05' ,'NGLAWISAN'  ,'SLTA/SEDERAJAT' ,'BURUH HARIAN LEPAS'   ,'MENIKAH' ,'T'),
                ('3308082108870004' ,'3308080710130008' ,'SUTAR'        ,'BAKALAN'      ,'07' ,'L' ,'AGAMA' ,'1997-06-05' ,'BAKALAN'    ,'SLTA/SEDERAJAT' ,'WIRASWASTA'           ,'MENIKAH' ,'T'),
                ('3308084602860006' ,'3308080710130008' ,'KUNDARYANTI' ,'BAKALAN' ,'07' ,'P' ,'AGAMA' ,'1995-06-05' ,'BAKALAN' ,'SLTA/SEDERAJAT' ,'MENGURUS RUMAH TANGGA' ,'MENIKAH' ,'T'),
                ('3308082511850003' ,'3308081309130002' ,'BAMBANG SETYAWAN' ,'BAKALAN' ,'07' ,'L' ,'AGAMA' ,'1995-06-05' ,'BAKALAN' ,'TAMAT SD/SEDERAJAT' ,'WIRASWASTA' ,'MENIKAH' ,'T'),
                ('3308081605900004' ,'3308081106130005' ,'ANTON' ,'BAKALAN' ,'03' ,'L' ,'AGAMA' ,'1999-06-05' ,'BAKALAN' ,'TIDAK/BELUM SEKOLAH' ,'BURUH HARIAN LEPAS' ,'BELUM/TIDAK' ,'T'),
                ('3308085609870001' ,'3308082502075280' ,'LINDA REGINA' ,'TEGALARUM' ,'01' ,'P' ,'AGAMA' ,'1997-06-05' ,'TEGALARUM' ,'DIPLOMA IV/STRATA I' ,'KARYAWAN SWASTA' ,'BELUM/TIDAK' ,'T'),
                ('3308085812880002' ,'3308082502075280' ,'MARIANA DEWI' ,'TEGALARUM' ,'01' ,'P' ,'AGAMA' ,'1998-06-05' ,'TEGALARUM' ,'DIPLOMA IV/STRATA I' ,'KARYAWAN SWASTA' ,'BELUM/TIDAK' ,'T'),
                ('3308082907870002' ,'3308082502074068' ,'YANI AGUNG SUBIYANTO' ,'BAKALAN' ,'07' ,'L' ,'AGAMA' ,'1997-06-05' ,'BAKALAN' ,'SLTA/SEDERAJAT' ,'KARYAWAN SWASTA' ,'MENIKAH' ,'T'),
                ('3308082804900001' ,'3308082502074068' ,'YUDI DANIAMI' ,'BAKALAN' ,'07' ,'L' ,'AGAMA' ,'1999-06-05' ,'BAKALAN' ,'SLTA/SEDERAJAT' ,'KARYAWAN SWASTA' ,'BELUM/TIDAK' ,'T'),
                ('3308076003890007' ,'3308082502074829' ,'DEVI MARVIANA' ,'DUKUH' ,'02' ,'P' ,'AGAMA' ,'1998-06-05' ,'DUKUH' ,'SLTA/SEDERAJAT' ,'MENGURUS RUMAH TANGGA' ,'MENIKAH' ,'T'),
                ('3308084304880001' ,'3308082502074563' ,'APRIANI' ,'TEJOWARNO' ,'01' ,'P' ,'AGAMA' ,'1997-06-05' ,'TEJOWARNO' ,'SLTA/SEDERAJAT' ,'KARYAWAN SWASTA' ,'BELUM/TIDAK' ,'T'),
                ('3308086005870001' ,'3308081410140005' ,'FITRIYA ZAKIYAH' ,'TEJOWARNO' ,'01' ,'P' ,'AGAMA' ,'1996-06-05' ,'TEJOWARNO' ,'SLTA/SEDERAJAT' ,'GURU' ,'MENIKAH' ,'T'),
                ('3616082007880006' ,'3308081111140005' ,'MOHAMMAD YULIANTO' ,'NGLAWISAN' ,'02' ,'L' ,'AGAMA' ,'1998-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'KARYAWAN SWASTA' ,'MENIKAH' ,'T'),
                ('3308082107880001' ,'3308082502073931' ,'DIAN KUKUH PURNANDI' ,'BAKALAN' ,'03' ,'L' ,'AGAMA' ,'1998-06-05' ,'BAKALAN' ,'SLTA/SEDERAJAT' ,'PELAJAR/MAHASISWA' ,'BELUM/TIDAK' ,'T'),
                ('3308081204870007' ,'3308081311140003' ,'JASMAN DONI PUTRA' ,'NGLAWISAN' ,'04' ,'L' ,'AGAMA' ,'1996-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'PEDAGANG' ,'MENIKAH' ,'T'),
                ('3308080509870002' ,'3308081407120009' ,'ISROIBIN' ,'PONALAN' ,'05' ,'L' ,'AGAMA' ,'1997-06-05' ,'PONALAN' ,'SLTP/SEDERAJAT' ,'BURUH HARIAN LEPAS' ,'MENIKAH' ,'T'),
                ('3308082807870001' ,'3308082502076271' ,'PUJI MULYO NUGROHO' ,'NGLAWISAN' ,'04' ,'L' ,'AGAMA' ,'1997-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'WIRASWASTA' ,'BELUM/TIDAK' ,'T'),
                ('3308080506880001' ,'3308082502074515' ,'ROHMAT ARIFUDIN' ,'NGLAWISAN' ,'04' ,'L' ,'AGAMA' ,'1997-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'BURUH HARIAN LEPAS' ,'BELUM/TIDAK' ,'T'),
                ('3308083112870007' ,'3308081607130008' ,'ANDRIYANTO' ,'NGLAWISAN' ,'03' ,'L' ,'AGAMA' ,'1997-06-05' ,'NGLAWISAN' ,'TIDAK/BELUM SEKOLAH' ,'BURUH HARIAN LEPAS' ,'BELUM/TIDAK' ,'T'),
                ('3308080104890002' ,'3308080504100006' ,'SASONGJKO WIDHYATMAJA' ,'PONALAN' ,'05' ,'L' ,'AGAMA' ,'1998-06-05' ,'PONALAN' ,'SLTA/SEDERAJAT' ,'BURUH HARIAN LEPAS' ,'BELUM/TIDAK' ,'T'),
                ('3308080209850002' ,'3308081005100027' ,'BUDI HARTANTO' ,'NGLAWISAN' ,'04' ,'L' ,'AGAMA' ,'1995-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'BURUH HARIAN LEPAS' ,'MENIKAH' ,'T'),
                ('3308084501890003' ,'3308081005100027' ,'ROCHMIYATI' ,'NGLAWISAN' ,'04' ,'P' ,'AGAMA' ,'1998-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'WIRASWASTA' ,'MENIKAH' ,'T'),
                ('3308086208890001' ,'3308082502076289' ,'QONITA AFGAN' ,'NGLAWISAN' ,'01' ,'P' ,'AGAMA' ,'1999-06-05' ,'NGLAWISAN' ,'SLTA/SEDERAJAT' ,'PELAJAR/MAHASISWA' ,'BELUM/TIDAK' ,'T'),
                ('3308082408850001' ,'3308081707130001' ,'NANANG SUSANTO' ,'NGLAWISAN' ,'02' ,'L' ,'AGAMA' ,'1995-06-05' ,'NGLAWISAN' ,'SLTA/SEDERAJAT' ,'WIRASWASTA' ,'MENIKAH' ,'T'),
                ('3308086709880001' ,'3308081707130001' ,'LILIK HERAWATI' ,'NGLAWISAN' ,'02' ,'P' ,'AGAMA' ,'1998-06-05' ,'NGLAWISAN' ,'SLTP/SEDERAJAT' ,'MENGURUS RUMAH TANGGA' ,'MENIKAH' ,'T'),
                ('3308085012880002' ,'3308082901150002' ,'PRADEWI' ,'NGENTAK' ,'01' ,'P' ,'AGAMA' ,'1998-06-05' ,'NGENTAK' ,'DIPLOMA I/II' ,'PELAJAR/MAHASISWA' ,'BELUM/TIDAK' ,'T'),
                ('3308084712860006' ,'3308081205110001' ,'HILDA DINIARTI' ,'NGENTAK' ,'01' ,'P' ,'AGAMA' ,'1996-06-05' ,'NGENTAK' ,'SLTA/SEDERAJAT' ,'PELAJAR/MAHASISWA' ,'BELUM/TIDAK' ,'T'),
                ('3308081805880001' ,'3308082803110015' ,'AHMAD RIZA SUSANTO' ,'PONALAN' ,'01' ,'L' ,'AGAMA' ,'1997-06-05' ,'PONALAN' ,'SLTA/SEDERAJAT' ,'MEKANIK' ,'MENIKAH' ,'T'),
                ('3308085906860002' ,'3308082803110015' ,'NURIYAH' ,'PONALAN' ,'01' ,'P' ,'AGAMA' ,'1995-06-05' ,'PONALAN' ,'SLTA/SEDERAJAT' ,'WIRASWASTA' ,'MENIKAH' ,'T'),
                ('3308084505890003' ,'3308082502074080' ,'NURFITRIANA' ,'PONALAN' ,'01' ,'P' ,'AGAMA' ,'1998-06-05' ,'PONALAN' ,'BELUM TAMAT SD/SEDERAJAT' ,'BELUM/TIDAK BEKERJA' ,'BELUM/TIDAK' ,'T')
            ;
        ");
    }
}
