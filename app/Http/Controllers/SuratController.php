<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function pengajuan()
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'pengajuan-surat'];
        return view('surat.pengajuan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function riwayat()
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'riwayat'];
        $surats = PengajuanSurat::all(); // Mengambil semua data dari tabel surat dengan menggunakan model surat
        return view('surat.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('surats', $surats); // Mengirim data surat ke view
    }

    public function hasilform()
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'pengajuan-surat'];
        return view('surat.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function destroy($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.riwayat')->with('success', 'Surat berhasil dihapus.');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:25',
            'alamat_rumah' => 'required|string|max:100',
            'kepentingan' => 'required|string|max:100',
            'perihal' => 'required|in:pengantar domisili,pembuatan KTP,pengantar kematian,keterangan tidak mampu',
        ]);

        // Simpan data ke database
        PengajuanSurat::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'alamat_rumah' => $request->alamat_rumah,
            'kepentingan' => $request->kepentingan,
            'perihal' => $request->perihal,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('surat.riwayat')->with('success', 'Pengajuan surat berhasil disimpan.');
    }
}
