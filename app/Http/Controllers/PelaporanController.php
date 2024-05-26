<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        return view('pengajuanlaporan.index');
    }
    public function hasilform()
    {
        return view('pengajuanlaporan.hasilform.index');
    }

    public function riwayatlaporan()
    {
        return view('pengajuanlaporan.riwayatlaporan.index');
    }
}
