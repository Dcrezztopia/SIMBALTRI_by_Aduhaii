<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
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
    public function show($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        return view('surat.detail', compact('surat'));
    }

    public function edit($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        $surat->update($request->all());
        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate');
    }
    public function destroy($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $surat = PengajuanSurat::findOrFail($id);
        $surat->status = $status;
        $surat->save();
        return redirect()->route('surat.index')->with('success', 'Status surat berhasil diubah');
    }
}
