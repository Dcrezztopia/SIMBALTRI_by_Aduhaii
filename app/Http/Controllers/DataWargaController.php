<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\DataWarga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataWargaController extends Controller
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

    public function index()
    {
        // $user = Auth::user();

        // return match ($user->role) {
        //     'admin' => $this->admin($user),
        //     default => abort(404),
        // };
        return $this->admin();
    }

    public function admin()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['data-warga'];
        if (str_ends_with($this->user->role, 'rt')) {
            $rt_user = DB::table('rt_user')->where('user_id', $this->user->id)->first();
            $dataWarga = DataWarga::where('RT', $rt_user->RT)->get();
        } else {
            $dataWarga = DataWarga::all();
        }
        return view('datawarga.index')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('dataWarga', $dataWarga)
            ->with('user', $this->user);
    }

    public function create()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['data-warga'];
        return view('datawarga.create')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:data_warga|string|max:16',
            'no_kk' => 'required|unique:data_warga|string|max:16',
            'nama' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:200',
            'RT' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:25',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:25',
            'status_pernikahan' => 'required|string|max:25',
            'status_penduduk' => 'required|string|max:25',
        ]);

        // Simpan data ke database
        DataWarga::create([
            'nik' => $request->input('nik'),
            'no_kk' => $request->input('no_kk'),
            'nama' => $request->input('nama'),
            'alamat_rumah' => $request->input('alamat_rumah'),
            'RT' => $request->input('RT'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'status_pernikahan' => $request->input('status_pernikahan'),
            'status_penduduk' => $request->input('status_penduduk'),
        ]);

        // Berhasil, redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('datawarga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($nik)
    {
        $this->sidebarItems->for($this->user->role);
        $datawarga = DataWarga::findOrFail($nik);

        $this->activeSidebarItem = ['data-warga'];
        return view('datawarga.edit')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('datawarga', $datawarga);
    }

    public function update(Request $request, $nik)
    {

        // Validasi data
        $request->validate([
            'no_kk' => 'required|string|max:16',
            'nama' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:200',
            'RT' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:25',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:25',
            'status_pernikahan' => 'required|string|max:25',
            'status_penduduk' => 'required|string|max:25',
        ]);

        // Temukan data berdasarkan NIK
        $datawarga = DataWarga::findOrFail($nik);

        // Perbarui data warga
        $datawarga->update($request->all());

        return redirect()->route('datawarga.index')->with('Success!', 'Data warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $datawarga->delete();

        return redirect()->route('datawarga.index')->with('success', 'Data warga berhasil dihapus.');
    }


}
