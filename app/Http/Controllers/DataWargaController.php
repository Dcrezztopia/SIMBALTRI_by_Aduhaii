<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\DataWarga; // Tambahkan model DataWarga
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataWargaController extends Controller
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
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            // 'warga' => $this->warga(),
            'admin' => $this->admin($user),
            default => abort(404),
        };
    }

    // public function warga()
    // {
    //     $this->activeSidebarItem = ['data-warga'];
    //     $dataWarga = DataWarga::all(); // Ambil data warga dari database
    //     return view('data-warga.warga')
    //         ->with('sidebarItems', $this->sidebarItems)
    //         ->with('activeSidebarItem', $this->activeSidebarItem)
    //         ->with('dataWarga', $dataWarga); // Kirim data ke view
    // }

    public function admin()
    {
        $this->activeSidebarItem = ['data-warga'];
        $dataWarga = DataWarga::all(); // Ambil data warga dari database
        return view('datawarga.index')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('dataWarga', $dataWarga) // Kirim data ke view
            ->with('user', $this->user); // Kirim data ke view
    }

    public function create()
    {
        $this->activeSidebarItem = ['data-warga'];
        return view('datawarga.create')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:data_warga|string|max:16',
            'no_kk' => 'required|unique:data_warga|string|max:16',
            'nama' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:200',
            'RT' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:25',
            'pendidikan' => 'required|in:TIDAK/BELUM SEKOLAH, BELUM TAMAT SD, TAMAT SD, SLTP/SEDERAJAT ,SLTA/SEDERAJAT, 
            DIPLOMA I/II,DIPLOMA III, DIPLOMA IV/STRATA I , STRATA II, STRATA III',
            'pekerjaan' => 'required|string|max:25',
            'status_pernikahan' => 'required|in:BELUM/TIDAK,MENIKAH,JANDA/DUDA',
            'status_penduduk' => 'required|in:T,P,A',
        ]);

        // Simpan data ke database
        DataWarga::create([
            'nik' => $request->input('nik'),
            'no_kk' => $request->input('no_kk'),
            'nama' => $request->input('nama'),
            'alamat_rumah' => $request->input('alamat_rumah'),
            'RT' => $request->input('RT'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'status_pernikahan' => $request->input('status_pernikahan'),
            'status_pendidikan' => $request->input('status_pendidikan'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('datawarga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    
}