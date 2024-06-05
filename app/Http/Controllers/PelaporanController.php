<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Http\Request;
use App\Models\Pelaporan;


class  PelaporanController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
        $this->sidebarItems = (new Sidebar())
            ->getItems();
    }

    public function index()
    {
        return view('pelaporan.index');
    }

    // public function hasilform()
    // {
    //     return view('pelaporan.hasilform.index');
    // }

    public function riwayatpelaporan()
    {
        return view('pelaporan.riwayatpelaporan.index');
    }

    public function lapor()
    {
        $this->activeSidebarItem = ['pelaporan', 'lapor'];
        return view('pelaporan.lapor')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function riwayat()
    {
        $this->activeSidebarItem = ['pelaporan', 'riwayat'];
        $pelaporans = Pelaporan::all(); // Mengambil semua data dari tabel pelaporan dengan menggunakan model pelaporan
        return view('pelaporan.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('pelaporans', $pelaporans); // Mengirim data pelaporan ke view
    }

    public function hasilform()
    {
        $this->activeSidebarItem = ['pelaporan', 'hasilform'];
        return view('pelaporan.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function destroy($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->delete();

        return redirect()->route('pelaporan.riwayat')->with('success', 'pelaporan berhasil dihapus.');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P', // Menambahkan validasi jenis kelamin
            'kewarganegaraan' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:100',
            'perihal' => 'required|string|max:100',
            'isi' => 'required|string|max:500',
            'foto_bukti' => 'required|image|max:2048', // Validasi foto bukti
        ]);

    
        if ($request->hasFile('foto_bukti')) {
            $file = $request->file('foto_bukti');
            $path = $file->store('public/foto_bukti');
        }


        // Simpan data ke database
        Pelaporan::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat_rumah' => $request->alamat_rumah,
            'perihal' => $request->perihal,
            'isi' => $request->isi,
            'foto_bukti' => $path
        ]);

        session([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat_rumah' => $request->alamat_rumah,
            'perihal' => $request->perihal,
            'isi' => $request->isi,
            'foto_bukti' => $path
        ]);


        return redirect()->route('pelaporan.hasilform');


    }
}
