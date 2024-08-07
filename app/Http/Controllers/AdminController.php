<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\DataWarga;
use App\Models\KegiatanWarga;
use App\Models\PengajuanSurat;
use App\Models\RTUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        $this->sidebarItems = new Sidebar();
    }

    public function index()
    {
        $this->sidebarItems->for($this->user->role);
        // $dataWarga = DB::table('data_warga')->select('tanggal_lahir')->get();
        $dataWarga = DataWarga::select(['tanggal_lahir', 'pendidikan'])->get();
        // $pendidikanDistribusi = DataWarga::select('pendidikan')->get();

        // dd($dataWarga);

        // Hitung umur berdasarkan tanggal lahir
        $umurData = [];
        foreach ($dataWarga as $warga) {
            $umur = \Carbon\Carbon::parse($warga->tanggal_lahir)->age;
            $umurData[] = $umur;
        }

        // Hitung pendidikan
        $pendidikanData = [];
        foreach ($dataWarga as $warga) {
            $pendidikanData[] = $warga->pendidikan;
        }

        // dd($umurData);

        // Kelompokkan umur
        $umurKelompok = [
            '0-10' => 0,
            '11-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '61+' => 0
        ];
        $pendidikanKelompok = [
            'SLTA/SEDERAJAT' => 0,
            'SLTP/SEDERAJAT' => 0,
            'TIDAK/BELUM SEKOLAH' => 0,
            'BELUM TAMAT SD/SEDERAJAT' => 0,
            'TAMAT SD/SEDERAJAT' => 0,
            'DIPLOMA I/II' => 0,
            'DIPLOMA IV/STRATA I' => 0,
            'Tidak Memiliki Pendidikan' => 0,
        ];

        foreach ($umurData as $umur) {
            if ($umur <= 10) {
                $umurKelompok['0-10']++;
            } elseif ($umur <= 20) {
                $umurKelompok['11-20']++;
            } elseif ($umur <= 30) {
                $umurKelompok['21-30']++;
            } elseif ($umur <= 40) {
                $umurKelompok['31-40']++;
            } elseif ($umur <= 50) {
                $umurKelompok['41-50']++;
            } elseif ($umur <= 60) {
                $umurKelompok['51-60']++;
            } else {
                $umurKelompok['61+']++;
            }
        }
        foreach ($pendidikanData as $pendidikan) {
            if ($pendidikan == 'SLTA/SEDERAJAT') {
                $pendidikanKelompok['SLTA/SEDERAJAT']++;
            } elseif ($pendidikan == 'SLTP/SEDERAJAT') {
                $pendidikanKelompok['SLTP/SEDERAJAT']++;
            } elseif ($pendidikan == 'TIDAK/BELUM SEKOLAH') {
                $pendidikanKelompok['TIDAK/BELUM SEKOLAH']++;
            } elseif ($pendidikan == 'BELUM TAMAT SD/SEDERAJAT') {
                $pendidikanKelompok['BELUM TAMAT SD/SEDERAJAT']++;
            } elseif ($pendidikan == 'TAMAT SD/SEDERAJAT') {
                $pendidikanKelompok['TAMAT SD/SEDERAJAT']++;
            } elseif ($pendidikan == 'DIPLOMA I/II') {
                $pendidikanKelompok['DIPLOMA I/II']++;
            } elseif ($pendidikan == 'DIPLOMA IV/STRATA I') {
                $pendidikanKelompok['DIPLOMA IV/STRATA I']++;
            }
            // else {
            //     $pendidikanKelompok['Tidak Memiliki Pendidikan']++;
            // }
        }

        $datawarga = [];
        $datawarga['jumlah-rt'] = DataWarga::select(DB::raw('count(distinct RT) as jumlah_rt'))->first()->jumlah_rt;
        $datawarga['jumlah-warga'] = DataWarga::count();

        $kegiatanWarga = KegiatanWarga::all();

        switch ($this->user->role) {
            case 'ketua_rt':
            case 'sekretaris_rt':
            case 'bendahara_rt':
                $rt_user = RTUser::find($this->user->id);
                $surats = PengajuanSurat::with('user')->where(['status' => 'menunggu'])->get()->filter(function ($surat) use ($rt_user) {
                    if (!isset($surat->user->RT)) {
                        return false;
                    }
                    return
                        $surat->user->RT
                            ===
                        $rt_user->RT;
                });
            case 'admin':
            case 'ketua_rw':
            case 'sekretaris_rw':
            case 'bendahara_rw':
                $surats = PengajuanSurat::where(['status' => 'menunggu'])->get();
                break;
            default:
                abort(404);
                break;
        }


        $this->activeSidebarItem = ['dashboard', ''];
        return view('admin.dashboard')
            ->with('surats', $surats)
            ->with('kegiatanWarga', $kegiatanWarga)
            ->with('datawarga', $datawarga)
            ->with('umurKelompok', $umurKelompok)
            ->with('pendidikanKelompok', $pendidikanKelompok)
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data_warga()
    {
        $this->activeSidebarItem = ['data-warga', ''];
        $dataWarga = DataWarga::all();
        return view('datawarga.index')
            ->with('user', $this->user)
            ->with('dataWarga', $dataWarga)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function get_data_warga()
    {
        $dataWarga = DataWarga::all();
        return response()->json($dataWarga);
    }
}
