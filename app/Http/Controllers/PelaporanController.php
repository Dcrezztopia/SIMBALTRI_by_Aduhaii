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
}

