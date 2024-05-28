<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
// use Illuminate\Http\Request;

class BansosController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function index()
    {
    }

    public function riwayat()
    {
        $this->activeSidebarItem = ['bansos', 'riwayat'];
        return view('bansos.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function permintaan()
    {
        $this->activeSidebarItem = ['bansos', 'permintaan'];
        return view('bansos.permintaan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function pengajuan()
    {
        $this->activeSidebarItem = ['bansos', 'pengajuan'];
        return view('bansos.pengajuan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data()
    {
        $this->activeSidebarItem = ['bansos', 'data'];
        return view('bansos.data')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
