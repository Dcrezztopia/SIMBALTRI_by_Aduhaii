<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class KegiatanController extends Controller
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
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        return view('kegiatan.warga')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function admin()
    {
        $this->activeSidebarItem = ['kegiatan-dan-iuran', 'kegiatan'];
        return view('kegiatan.admin')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
