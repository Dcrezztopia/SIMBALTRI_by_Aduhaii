<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
// use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $sidebarItems;
    public function index()
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
            ->addItem('placeholder', [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Profile',
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
        return view('dashboard', ['sidebarItems' => $this->sidebarItems]);
    }
}
