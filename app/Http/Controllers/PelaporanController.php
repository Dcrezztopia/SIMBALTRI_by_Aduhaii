<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Http\Request;

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
        return view('pelaporan.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function hasilform()
    {
        $this->activeSidebarItem = ['pelaporan', 'hasilform'];
        return view('pelaporan.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
