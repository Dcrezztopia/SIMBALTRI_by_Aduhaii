<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class WargaController extends Controller
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
        $this->sidebarItems = new Sidebar();
        $this->sidebarItems->for('warga');
    }

    public function index()
    {
        $this->activeSidebarItem = ['home', ''];
        return view('warga.home')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
