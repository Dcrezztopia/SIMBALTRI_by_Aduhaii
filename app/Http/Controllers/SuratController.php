<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
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
    }

    public function pengajuan()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['surat', 'pengajuan-surat'];
        $this->sidebarItems->for('warga');
        return view('surat.pengajuan')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function riwayat()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['surat', 'riwayat'];
        switch ($this->user->role) {
            case 'admin':
            case 'ketua_rw':
            case 'sekretaris_rw':
            case 'bendahara_rw':
                $surats =  PengajuanSurat::all();
                break;
            case 'ketua_rt':
            case 'sekretaris_rt':
            case 'bendahara_rt':
                $rt_user = DB::table('rt_user')->where('user_id', $this->user->id)->first();
                $surats =  PengajuanSurat::with('user')->get()->filter(function ($surat) use ($rt_user) {
                    if ($surat->user == null) {
                        return false;
                    } else {
                        return $surat->user->RT === $rt_user->RT;
                    }
                });
                break;
            default:
                $surats = PengajuanSurat::where('id_pembuat', Auth::id())->get();
                break;
        };
        return view('surat.riwayat')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('surats', $surats); // Mengirim data surat ke view
    }

    public function hasilform()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['surat', 'pengajuan-surat'];
        return view('surat.hasilform')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function destroy($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.riwayat')->with('success', 'Surat berhasil dihapus.');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:25',
            'alamat_rumah' => 'required|string|max:100',
            'kepentingan' => 'required|string|max:100',
            'perihal' => 'required|in:pengantar_domisili,pembuatan_KTP,pengantar_kematian,keterangan_tidak_mampu',
        ]);

        // Simpan data ke database
        PengajuanSurat::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'alamat_rumah' => $request->alamat_rumah,
            'kepentingan' => $request->kepentingan,
            'perihal' => $request->perihal,
            'id_pembuat' => Auth::id(),
        ]);

        session([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'alamat_rumah' => $request->alamat_rumah,
            'kepentingan' => $request->kepentingan,
            'perihal' => $request->perihal,
        ]);

        // Redirect ke halaman hasil
        return redirect()->route('surat.hasilform')->with('success', 'Surat berhasil diajukan.');
    }

    public function updateStatus($id, $status)
    {
        $this->sidebarItems->for('admin');
        // Validasi status
        if (!in_array($status, ['diterima', 'ditolak'])) {
            return redirect()->back()->withErrors(['Status tidak valid.']);
        }

        // Temukan surat berdasarkan ID
        $surat = PengajuanSurat::findOrFail($id);

        // Perbarui status
        $surat->status = $status;
        $surat->save();

        return redirect()->back()->with('success', 'Status surat berhasil diperbarui.');
    }

    public function show($id)
    {
        $this->sidebarItems->for($this->user->role);
        $surat = PengajuanSurat::findOrFail($id);

        $this->activeSidebarItem = ['surat', 'pengajuan-surat'];
        return view('surat.detail')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('surat', $surat);
    }
    public function edit($id)
    {
        $this->sidebarItems->for($this->user->role);
        $surat = PengajuanSurat::findOrFail($id);

        $this->activeSidebarItem = ['surat', 'pengajuan-surat'];
        return view('surat.edit')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('surat', $surat);
    }

    public function update(Request $request, $id)
    {
        $this->sidebarItems->for($this->user->role);
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:25',
            'alamat_rumah' => 'required|string|max:100',
            'kepentingan' => 'required|string|max:100',
            'perihal' => 'required|in:pengantar_domisili,pembuatan_KTP,pengantar kematian,keterangan tidak mampu',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'alamat_rumah.required' => 'Alamat rumah wajib diisi.',
            'kepentingan.required' => 'Kepentingan wajib diisi.',
            'perihal.required' => 'Perihal wajib diisi.',
            'perihal.in' => 'Perihal yang dipilih tidak valid.',
        ]);

        try {
            // Temukan surat berdasarkan ID
            $surat = PengajuanSurat::findOrFail($id);

            // Perbarui data surat
            $surat->update($request->only(['nama', 'tanggal_lahir', 'kewarganegaraan', 'pekerjaan', 'alamat_rumah', 'kepentingan', 'perihal']));

            return redirect()->route('surat.riwayat')->with('success', 'Surat berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui surat.']);
        }
    }

    public function generate_surat() {
    }
}
