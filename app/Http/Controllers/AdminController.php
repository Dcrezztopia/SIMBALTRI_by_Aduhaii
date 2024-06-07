<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\DataWarga;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function index()
    {
        $this->activeSidebarItem = ['dashboard', ''];
        return view('admin.dashboard')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data_warga()
    {
        $this->activeSidebarItem = ['data-warga', ''];
        $dataWarga = DataWarga::all();
        return view('datawarga.index')
            ->with('user', $this->user)
            ->with('dataWarga', $dataWarga)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function get_data_warga() {
        $dataWarga = DataWarga::all();
        return response()->json($dataWarga);
    }
}
