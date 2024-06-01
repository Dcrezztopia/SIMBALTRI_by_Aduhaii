<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\DataTables\PermohonanSuratDataTable;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

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

    public function store_pengajuan(Request $request)
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'pengajuan-surat'];
        // $permohonaSurat = PermohonanSurat::create($request->all());
        PermohonanSurat::create($request->except('_token'));
        return view('surat.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }


    public function riwayat(PermohonanSuratDataTable $datatable)
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'riwayat'];
        return $datatable->render(
            'surat.riwayat',
            [
                'sidebarItems' => $this->sidebarItems,
                'activeSidebarItem' => $this->activeSidebarItem
            ]
        );
        // return view('surat.riwayat')
        //     ->with('sidebarItems', $this->sidebarItems)
        //     ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function hasilform()
    {
        $this->activeSidebarItem = ['pengajuan-surat', 'pengajuan-surat'];
        return view('surat.hasilform')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
