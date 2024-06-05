<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\KegiatanWarga; // Tambahkan model KegiatanWarga
use App\Models\DataWarga; // Tambahkan model KegiatanWarga
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Import Request untuk validasi input
use Illuminate\Support\Facades\Validator; // Import Validator untuk validasi input


class KegiatanController extends Controller
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
            'warga' => $this->warga(),
            'admin' => $this->admin(),
            default => abort(404),
        };
    }

    public function warga()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        $kegiatanWarga = KegiatanWarga::all(); // Ambil data kegiatan warga dari database
        return view('kegiatan.warga')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('kegiatanWarga', $kegiatanWarga); // Kirim data ke view
    }

    public function admin()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        $kegiatanWarga = KegiatanWarga::all(); // Ambil data kegiatan warga dari database
        return view('kegiatan.admin')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('kegiatanWarga', $kegiatanWarga); // Kirim data ke view
    }

    // Action CRUD untuk Kegiatan Warga
    public function createKegiatanWarga()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        $data_warga = DataWarga::all();
        return view('kegiatan.create', compact('data_warga'))
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function storeKegiatanWarga(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        KegiatanWarga::create([
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal_pelaksanaan' => $request->input('tanggal_pelaksanaan'),
            'tempat_pelaksanaan' => $request->input('tempat_pelaksanaan'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan warga berhasil ditambahkan!');
    }

    public function editKegiatanWarga($id)
    {
        $kegiatanWarga = KegiatanWarga::find($id);

        if (!$kegiatanWarga) {
            abort(404);
        }

        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        return view('kegiatan.edit')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('kegiatanWarga', $kegiatanWarga);
    }

    public function updateKegiatanWarga(Request $request, $id)
    {
        $kegiatanWarga = KegiatanWarga::find($id);

        if (!$kegiatanWarga) {
            abort(404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        // Cek validasi, jika gagal kembalikan ke form edit dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Perbarui data di database
        $kegiatanWarga->update([
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal_pelaksanaan' => $request->input('tanggal_pelaksanaan'),
            'tempat_pelaksanaan' => $request->input('tempat_pelaksanaan'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan warga berhasil diperbarui!');
    }

    public function destroyKegiatanWarga($id)
    {
        $kegiatanWarga = KegiatanWarga::findOrFail($id);
        $kegiatanWarga->delete();

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan warga berhasil dihapus!');
    }
}
