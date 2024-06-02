<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\DataWarga; // Tambahkan model DataWarga
use App\Models\KegiatanWarga; // Tambahkan model KegiatanWarga
use Illuminate\Support\Facades\Auth;

class DataWargaController extends Controller
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
        $this->activeSidebarItem = ['data-warga'];
        $dataWarga = DataWarga::all(); // Ambil data warga dari database
        return view('data-warga.warga')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('dataWarga', $dataWarga); // Kirim data ke view
    }

    public function admin()
    {
        $this->activeSidebarItem = ['data-warga'];
        $dataWarga = DataWarga::all(); // Ambil data warga dari database
        return view('data-warga.admin')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('dataWarga', $dataWarga); // Kirim data ke view
    }
}
