<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  PelaporanController extends Controller
{
    public function index()
    {
        return view('pelaporan.index');
    }

    public function hasilform()
    {
        return view('pelaporan.hasilform.index');
    }

    public function riwayatpelaporan()
    {
        return view('pelaporan.riwayatpelaporan.index');
    }
}

