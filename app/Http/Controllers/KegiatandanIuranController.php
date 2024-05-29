<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatandanIuranController extends Controller
{
    public function index()
    {
        return view('kegiatandaniuran.index');
    }


    public function iuranwarga()
    {
        return view('kegiatandaniuran.iuranwarga.index');
    }
}

