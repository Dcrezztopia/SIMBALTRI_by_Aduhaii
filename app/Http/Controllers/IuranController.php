<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\IuranWarga;
use Illuminate\Support\Facades\Auth;

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
}
