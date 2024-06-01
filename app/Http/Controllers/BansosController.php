<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\DataTables\BansosDataTable;
use App\DataTables\PermintaanBansosDataTable;
use App\DataTables\PermintaanSuratDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Bansos;
use App\Models\PermintaanBansos;
use Illuminate\Http\Request;

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

    public function riwayat(PermintaanBansosDataTable $datatable)
    {
        $this->activeSidebarItem = ['bansos', 'riwayat'];
        return $datatable->render('bansos.riwayat',
            [
            'sidebarItems' => $this->sidebarItems,
            'activeSidebarItem' => $this->activeSidebarItem
            ]
        );
        // return view('bansos.riwayat')
        //     ->with('sidebarItems', $this->sidebarItems)
        //     ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function permintaan()
    {
        $this->activeSidebarItem = ['bansos', 'permintaan'];
        return view('bansos.permintaan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function store_permintaan(Request $request)
    {
        PermintaanBansos::create($request->except('_token'));
        return redirect()->route('bansos.riwayat');
    }

    public function pengajuan()
    {
        $this->activeSidebarItem = ['bansos', 'pengajuan'];
        return view('bansos.pengajuan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data(BansosDataTable $datatable)
    {
        $this->activeSidebarItem = ['bansos', 'data'];
        return $datatable->render('bansos.data' ,
            [
                'sidebarItems' => $this->sidebarItems,
                'activeSidebarItem' => $this->activeSidebarItem
            ]
        );
    }
}
