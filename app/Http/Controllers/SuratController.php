<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
// use Illuminate\Http\Request;

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
        return view('surat.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function hasilform()
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'pengajuan-surat'];
        return view('surat.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
