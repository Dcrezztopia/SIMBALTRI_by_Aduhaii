<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        return view('pengajuansurat.index');
    }

    public function hasilform()
    {
        return view('pengajuansurat.hasilform.index');
    }

    public function riwayatsurat()
    {
        return view('pengajuansurat.riwayatsurat.index');
    }
}

