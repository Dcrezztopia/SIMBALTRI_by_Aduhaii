<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
// use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
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
            ->addItem('profile', [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Profile(contoh)',
                'route' => null,
                'children' => [
                    'profile' => [
                        'icon' => 'bi-circle',
                        'label' => 'Profile',
                        'route' => 'placeholder1'
                    ]
                ]
            ])
            ->getItems();
    }

    public function index()
    {
        $this->activeSidebarItem = ['dashboard', ''];
        return view('admin.dashboard')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
}
