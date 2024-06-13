<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\IuranWarga;
use App\Models\DataWarga; // Tambahkan model KegiatanWarga
use App\Models\KegiatanWarga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Import Request untuk validasi input
use Illuminate\Support\Facades\Validator; // Import Validator untuk validasi input
// use Illuminate\Http\Request;

class IuranController extends Controller
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
        $user = Auth::user();
        return match ($user->role) {
            'warga' => $this->warga(),
            'admin'
            , 'ketua_rw'
            , 'ketua_rt'
            , 'sekretaris_rw'
            , 'sekretaris_rt'
            , 'bendahara_rw'
            , 'bendahara_rt' => $this->admin(),
            default => abort(404),
        };
    }

    public function warga()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $iuranWarga = IuranWarga::all(); // Ambil data iuran warga dari database
        return view('iuran.index')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga); // Kirim data ke view
    }

    public function admin()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $iuranWarga = IuranWarga::all(); // Ambil data iuran warga dari database
        return view('iuran.index')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga); // Kirim data ke view
    }
    // Action CRUD untuk Kegiatan Warga
    public function createIuranWarga()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $kegiatanWarga = KegiatanWarga::all();
        $data_warga = DataWarga::all(); // Fetch all warga data
        return view('iuran.create', compact('kegiatanWarga', 'data_warga'))
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function storeIuranWarga(Request $request)
    {

        // Validasi input
        $request->validate([
            'id_kegiatan' => 'required',
            'periode' => 'required|date',
            'interval' => 'required|integer',
            'penanggung_jawab' => 'required',
            'total' => 'required|integer',
        ]);

        // Simpan data ke database
        IuranWarga::create([
            'id_kegiatan' => $request->input('id_kegiatan'),
            'periode' => $request->input('periode'),
            'interval' => $request->input('interval'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
            'total' => $request->input('total'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('iuran.index')->with('success', 'Iuran warga berhasil ditambahkan!');
    }


    public function editIuranWarga($id)
    {
        $this->sidebarItems->for($this->user->role);
        $iuranWarga = IuranWarga::findOrFail($id);
        $kegiatanWarga = KegiatanWarga::all();
        $data_warga = DataWarga::all(); // Tambahkan baris ini untuk mengambil data warga

        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        return view('iuran.edit', compact('iuranWarga', 'data_warga'))
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga)
            ->with('kegiatanWarga', $kegiatanWarga)
            ->with('data_warga', $data_warga); // Tambahkan baris ini untuk mengirimkan data warga ke view
    }

    public function updateIuranWarga(Request $request, $id)
    {
        $iuranWarga = IuranWarga::findOrFail($id);

        $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan_warga',
            'periode' => 'required|date',
            'interval' => 'required|integer',
            'penanggung_jawab' => 'required|string|max:16',
            'total' => 'required|integer',
        ]);

        $iuranWarga->update([
            'id_kegiatan' => $request->input('id_kegiatan'),
            'periode' => $request->input('periode'),
            'interval' => $request->input('interval'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
            'total' => $request->input('total'),
        ]);
        $iuran = IuranWarga::findOrFail($id);
        $iuran->update($request->all());

        return redirect()->route('iuran.index')->with('success', 'Iuran warga berhasil diperbarui!');
    }

    public function destroyIuranWarga($id)
    {
        $iurannWarga = IuranWarga::findOrFail($id);
        $iurannWarga->delete();

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('iuran.index')->with('success', 'Iuran warga berhasil dihapus!');
    }
}
