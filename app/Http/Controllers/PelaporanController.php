<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use DateTime;
use Illuminate\Support\Facades\Auth;

class  PelaporanController extends Controller
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
        $this->sidebarItems->for($this->user->role);
        // $pelaporans = Pelaporan::all();
        return view('pelaporan.index');
    }

    // public function hasilform()
    // {
    //     return view('pelaporan.hasilform.index');
    // }

    public function riwayatpelaporan()
    {
        $this->sidebarItems->for($this->user->role);
        return view('pelaporan.riwayatpelaporan.index');
    }

    public function lapor()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['pelaporan', 'lapor'];
        return view('pelaporan.lapor')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function riwayat()
    {
        $this->sidebarItems->for($this->user->role);
        switch ($this->user->role) {
            case 'admin':
            case 'ketua_rw':
            case 'ketua_rt':
            case 'sekretaris_rt':
            case 'sekretaris_rw':
            case 'bendahara_rt':
            case 'bendahara_rw':
                $pelaporans = Pelaporan::all();
                break;
            default:
                $pelaporans = Pelaporan::where('id_pembuat', $this->user->id)->get();
                break;
        };
        $this->activeSidebarItem = ['pelaporan', 'riwayat'];
        return view('pelaporan.riwayat')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('pelaporans', $pelaporans); // Mengirim data pelaporan ke view
    }

    public function hasilform()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['pelaporan', 'hasilform'];
        return view('pelaporan.hasilform')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function destroy($id)
    {
        $this->sidebarItems->for($this->user->role);
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->delete();

        return redirect()->route('pelaporan.riwayat')->with('success', 'pelaporan berhasil dihapus.');
    }
    public function store(Request $request)
    {
        $this->sidebarItems->for($this->user->role);
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P', // Menambahkan validasi jenis kelamin
            'kewarganegaraan' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:100',
            'perihal' => 'required|string|max:100',
            'isi' => 'required|string|max:500',
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);


        if ($request->hasFile('foto_bukti')) {
            $fileName = time() . '.' . $request->foto_bukti->extension();
            $path = $request->file('foto_bukti')->storeAs('uploads', $fileName, 'public');
        }


        // Simpan data ke database
        Pelaporan::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat_rumah' => $request->alamat_rumah,
            'perihal' => $request->perihal,
            'isi' => $request->isi,
            'foto_bukti' => $path,
            'tanggal_dibuat' => new DateTime(),
            'id_pembuat' => Auth::id(),
        ]);

        session([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat_rumah' => $request->alamat_rumah,
            'perihal' => $request->perihal,
            'isi' => $request->isi,
            'foto_bukti' => $path
        ]);


        return redirect()->route('pelaporan.hasilform');
    }
    public function show($id)
    {
        $this->sidebarItems->for($this->user->role);
        $pelaporan = Pelaporan::findOrFail($id);
        $this->activeSidebarItem = ['pelaporan', 'lapor'];
        return view('pelaporan.detail', compact('pelaporan'))
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function edit($id)
    {
        $this->sidebarItems->for($this->user->role);
        $pelaporan = Pelaporan::findOrFail($id);
        $this->activeSidebarItem = ['pelaporan', 'lapor'];

        return view('pelaporan.edit', compact('pelaporan'))
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function update(Request $request, $id)
    {
        $this->sidebarItems->for($this->user->role);
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kewarganegaraan' => 'required|string|max:100',
            'alamat_rumah' => 'required|string|max:100',
            'perihal' => 'required|string|max:100',
            'isi' => 'required|string|max:500',
            'foto_bukti' => 'nullable|image|max:2048',
        ]);

        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update($request->all());

        if ($request->hasFile('foto_bukti')) {
            $path = $request->file('foto_bukti')->store('public/foto_bukti');
            $pelaporan->foto_bukti = basename($path);
            $pelaporan->save();
        }

        return redirect()->route('pelaporan.riwayat')->with('success', 'Pelaporan berhasil diperbarui.');
    }
}
