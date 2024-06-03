<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\IuranWarga;
use App\Models\DataWarga; // Tambahkan model KegiatanWarga
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Import Request untuk validasi input
use Illuminate\Support\Facades\Validator; // Import Validator untuk validasi input
// use Illuminate\Http\Request;

class IuranController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            'warga' => $this->warga(),
            'admin' => $this->admin(),
            default => abort(404),
        };
    }

    public function warga()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $iuranWarga = IuranWarga::all(); // Ambil data iuran warga dari database
        return view('iuran.warga')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga); // Kirim data ke view
    }

    public function admin()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $iuranWarga = IuranWarga::all(); // Ambil data iuran warga dari database
        return view('iuran.admin')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga); // Kirim data ke view
    }
    // Action CRUD untuk Kegiatan Warga
    public function createKegiatanWarga()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        $data_warga = DataWarga::all();
        return view('iuran.create', compact('data_warga'))
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function storeKegiatanWarga(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_kegiatan' => 'required|integer',
            'periode' => 'required|date',
            'interval' => 'required|integer',
            'penanggung_jawab' => 'required|string|max:16',
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

    public function editKegiatanWarga($id)
    {
        $iuranWarga = IuranWarga::find($id);

        if (!$iuranWarga) {
            abort(404);
        }

        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'iuran'];
        return view('iuran.edit')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('iuranWarga', $iuranWarga);
    }

    public function updateKegiatanWarga(Request $request, $id)
    {
        $iuranWarga = IuranWarga::find($id);

        if (!$iuranWarga) {
            abort(404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kegiatan' => 'required|integer',
            'periode' => 'required|date',
            'interval' => 'required|integer',
            'penanggung_jawab' => 'required|string|max:16',
            'total' => 'required|integer',
        ]);

        // Cek validasi, jika gagal kembalikan ke form edit dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Perbarui data di database
        $iuranWarga->update([
            'id_kegiatan' => $request->input('id_kegiatan'),
            'periode' => $request->input('periode'),
            'interval' => $request->input('interval'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
            'total' => $request->input('total'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('iuran.index')->with('success', 'Iuran warga berhasil diperbarui!');
    }

    public function destroyKegiatanWarga($id)
    {
        $iurannWarga = IuranWarga::findOrFail($id);
        $iurannWarga->delete();

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('iuran.index')->with('success', 'Iuran warga berhasil dihapus!');
    }
}
