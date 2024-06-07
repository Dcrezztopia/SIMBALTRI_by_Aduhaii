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
        $this->sidebarItems = (new Sidebar())
            // ->removeItem('dashboard')
            // ->addItem('dashboard', [
            //     'icon' => 'home',
            //     'label' => 'Dashboard',
            //     'route' => 'placeholder1',
            //     'children' => [
            //         'dashboard' => [
            //             'icon' => 'home',
            //             'label' => 'Dashboard',
            //             'route' => 'placeholder1'
            //         ],
            //         'profile' => [
            //             'icon' => 'user',
            //             'label' => 'Profile',
            //             'route' => 'placeholder1'
            //         ]
            //     ]
            // ])
            //->addItem('profile', [
            //    'icon' => 'bi-menu-button-wide',
            //    'label' => 'Profile(contoh)',
            //    'route' => null,
            //    'children' => [
            //        'profile' => [
            //            'icon' => 'bi-circle',
            //            'label' => 'Profile',
            //            'route' => 'placeholder1'
            //        ]
            //    ]
            //])
            ->getItems();
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
