<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $sidebarItems = (new Sidebar())->getItems();
        $activeSidebarItem = ['', ''];
        return view('landing-page')
            ->with('sidebarItems', $sidebarItems)
            ->with('activeSidebarItem', $activeSidebarItem);
    }
}
