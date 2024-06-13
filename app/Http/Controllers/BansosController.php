<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\KriteriaBansos;
use App\Models\KriteriaMappedScore;
use App\Models\PengajuanBansos;
use App\Models\DataWarga;
use App\Models\PerbandinganKriteriaBansos;
use App\Models\PerhitunganAhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// use Illuminate\Http\Request;

class BansosController extends Controller
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
    }

    public function riwayat()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'riwayat'];
        return view('bansos.riwayat')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function permintaan()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'permintaan'];
        return view('bansos.permintaan')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function pengajuan()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'pengajuan'];
        return view('bansos.pengajuan')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'data'];
        return view('bansos.data')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function evaluasi_penerima()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'evaluasi-penerima'];
        return view('bansos.evaluasi-penerima')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
    public function pengajuan_bansos()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'pengajuan-bansos'];
        return view('bansos.pengajuan-bansos')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }
    public function daftar_pengajuan()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'daftar_pengajuan'];
        $pengajuan_bansos = PengajuanBansos::all();
        $dataWarga = DataWarga::all();
        return view('bansos.daftar_pengajuan')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem)
            ->with('pengajuan_bansos', $pengajuan_bansos)
            ->with('dataWarga', $dataWarga);

    }

    public function penerima()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['bansos', 'penerima'];
        return view('bansos.penerima')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function kriteria()
    {
        $raw_kriteria = KriteriaBansos::all();
        // $kriteria = [];
        // foreach ($raw_kriteria as $k) {
        //     $kriteria[$k->id] = $k->nama;
        // }
        // $perbandinagn_kriteria = PerbandinganKriteriaBansos::all();
        return json_encode($raw_kriteria);
    }

    public function perbandingan()
    {
        $perbandinagn_kriteria = PerbandinganKriteriaBansos::with('left', 'right')->get()->map(function($item) {
            return [
                'right_id' => $item->right_id,
                'left_id' => $item->left_id,
                'right_nama' => $item->right->nama,
                'left_nama' => $item->left->nama,
                'right_val' => $item->right_val,
                'left_val' => $item->left_val,
            ];
        });
        return $perbandinagn_kriteria;
    }

    public function add_kriteria(Request $request)
    {
        // return response($request, 500);
        DB::beginTransaction();

        try {

            $kriteria = KriteriaBansos::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis
            ]);

            $kriterias = KriteriaBansos::all()->where('id', '!=', $kriteria->id);
            $perbandingan = [];

            foreach ($kriterias as $k) {
                array_push($perbandingan, [
                    'right_id' => $k->id,
                    'left_id' => $kriteria->id,
                    // 'right_val' => rand(1, 9),
                    // 'left_val' => rand(1, 9)
                ]);
                // PerbandinganKriteriaBansos::create([
                //     'right_id' => $k->id,
                //     'left_id' => $kriteria->id,
                //     'right_val' => rand(1, 9),
                //     'left_val' => rand(1, 9)
                // ]);
            }
            PerbandinganKriteriaBansos::insert($perbandingan);

            DB::commit();
            return response(['message' => 'Berhasil menambahkan kriteria'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(
                [
                    'message' => 'Gagal menambahkan kriteria',
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function delete_kriteria($id)
    {
        DB::beginTransaction();

        try {
            // Find the kriteria by id
            $kriteria = KriteriaBansos::find($id);

            if (!$kriteria) {
                return response()->json(['message' => 'Kriteria not found'], 404);
            }

            // Delete related PerbandinganKriteriaBansos records
            PerbandinganKriteriaBansos::where('right_id', $id)
                ->orWhere('left_id', $id)
                ->delete();

            // Delete the kriteria
            $kriteria->delete();

            DB::commit();
            return response()->json(['message' => 'Kriteria deleted successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'message' => 'Failed to delete kriteria',
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function set_perbandingan(Request $request)
    {
        PerbandinganKriteriaBansos::where('left_id', $request->left_id)
            ->where('right_id', $request->right_id)
            ->update([
                'left_val' => $request->left_val,
                'right_val' => $request->right_val
            ]);
    }

    public function set_multiple_perbandingan(Request $request)
    {
        DB::beginTransaction();
        try {
            array_map(function($perbandingan) {
                PerbandinganKriteriaBansos::where('left_id', $perbandingan['left_id'])
                    ->where('right_id', $perbandingan['right_id'])
                    ->update([
                        'left_val' => $perbandingan['left_val'],
                        'right_val' => $perbandingan['right_val']
                    ]);
            }, $request->perbandingan);
            // foreach ($request->perbandingan as $perbandingan) {
            //     $p = PerbandinganKriteriaBansos::firstWhere(
            //         [
            //             'right_id' => $perbandingan['right_id'],
            //             'left_id' => $perbandingan['left_id']
            //         ]);
            //     $p->left_val = $perbandingan['left_val'];
            //     $p->right_val = $perbandingan['right_val'];
            //     $p->save();
            //     Log::info($p);
            // }
            DB::commit();
            $all_perbandingan = PerbandinganKriteriaBansos::all();
            Log::info($all_perbandingan);
            return response()->json(['message' => 'Perbandingan kriteria berhasil disimpan'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'message' => 'Gagal menyimpan perbandingan kriteria',
                    'error' => $e->getMessage()
                ],
                500
            );
        }
            // foreach ($request->all_perbandingan as $perbandingan) {
            //     $p = PerbandinganKriteriaBansos::firstWhere(
            //         [
            //             'right_id' => $perbandingan['right_id'],
            //             'left_id' => $perbandingan['left_id']
            //         ]);
            //     $p->left_val = $perbandingan['left_val'];
            //     $p->right_val = $perbandingan['right_val'];
            //     $p->save();
            //     Log::info($p);
            // }
    }

    public function evaluasi_kriteria()
    {
        $ids = KriteriaBansos::select('id')->get();
        $perbandingan = PerbandinganKriteriaBansos::all();
        $input = array(
            'ids' => $ids->pluck('id'),
            'perbandingan' => $perbandingan
        );
        $cmd = "";
        if (PHP_OS_FAMILY === "Linux") {
            $cmd = "./../../../rust/bin/linux/ahp '" . json_encode($input) . "'";
        } elseif (PHP_OS_FAMILY === "Windows") {
            $cmd = "./../../../rust/bin/windows/ahp.exe '" . json_encode($input) . "'";
        }

        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin is a pipe that the child will read from
            1 => ["pipe", "w"],  // stdout is a pipe that the child will write to
            2 => ["pipe", "w"]   // stderr is a pipe that the child will write to
        ];

        $process = proc_open($cmd, $descriptorspec, $pipes, __DIR__);

        if (is_resource($process)) {
            // Write input to the process
            fwrite($pipes[0], json_encode($input));
            fclose($pipes[0]);

            // Capture output and error messages
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            if ($return_value !== 0) {
                return response(['message' => 'Failed to evaluate criteria', 'error' => $error], 500);
            }
            $ahp = json_decode($output, true);
            // return $ahp;
            DB::beginTransaction();
            try {
                // DB::table('perhitungan_ahp')->insert(['raw_data' => $result]);
                PerhitunganAhp::create(['raw_data' => $output]);
                foreach ($ids->pluck('id') as $i => $id) {
                    KriteriaBansos::where('id', $id)->update([
                        'weight' => $ahp['priority_weight'][$i]
                    ]);
                }
                DB::commit();
                return response(['message' => 'Kriteria berhasil dievaluasi', 'values' => $ahp], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response(['message' => 'Failed to update bobot', 'error' => $e->getMessage()], 500);
            }
        } else {
            return response(['message' => 'Failed to open process'], 500);
        }
    }

    private function raw_mapped_value() {
        $kriteria = KriteriaBansos::select('id', 'nama', 'jenis', 'jenis_score', 'weight', 'column_name', 'weight')->get();
        $mapper = KriteriaMappedScore::all();
        $data = PengajuanBansos::all();
        $input2 = [
            'kriteria' => $kriteria,
            'mapper' => $mapper,
            'data' => $data
        ];

        $command = "";// "/home/alimulap/.kuliah/college_stuff/spk/value_mapper/target/release/value_mapper '" . json_encode($input) . "'";

        if (PHP_OS_FAMILY === "Linux") {
            $command = "./../../../rust/bin/linux/value_mapper '" . json_encode($input2) . "'";
        } elseif (PHP_OS_FAMILY === "Windows") {
            $command = "./../../../rust/bin/windows/value_mapper.exe '" . json_encode($input2) . "'";
        }

        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin is a pipe that the child will read from
            1 => ["pipe", "w"],  // stdout is a pipe that the child will write to
            2 => ["pipe", "w"]   // stderr is a pipe that the child will write to
        ];

        $process = proc_open($command, $descriptorspec, $pipes, __DIR__);

        if (is_resource($process)) {
            // Write input to the process
            fwrite($pipes[0], json_encode($input2));
            fclose($pipes[0]);

            // Capture output and error messages
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            if ($return_value !== 0) {
                throw new \Exception('Failed to map value' . $error);
            }

            return [
                'kriteria' => $kriteria->pluck('nama'),
                'data' => $data->pluck('nama'),
                'values' => json_decode($output),
                'weight' => $kriteria->pluck('weight'),
                'jenis' => $kriteria->pluck('jenis'),
            ];
        } else {
            throw new \Exception('Failed to open process');
        }
    }

    public function mapped_value() {
        $kriteria = KriteriaBansos::select('id', 'nama', 'jenis', 'jenis_score', 'weight', 'column_name', 'weight')->get();
        $mapper = KriteriaMappedScore::all();
        $data = PengajuanBansos::all();
        $input = [
            'kriteria' => $kriteria,
            'mapper' => $mapper,
            'data' => $data
        ];

        $command = "";// "/home/alimulap/.kuliah/college_stuff/spk/value_mapper/target/release/value_mapper '" . json_encode($input) . "'";

        if (PHP_OS_FAMILY === "Linux") {
            $command = "./../../../rust/bin/linux/value_mapper '" . json_encode($input) . "'";
        } elseif (PHP_OS_FAMILY === "Windows") {
            $command = "./../../../rust/bin/windows/value_mapper.exe '" . json_encode($input) . "'";
        }

        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin is a pipe that the child will read from
            1 => ["pipe", "w"],  // stdout is a pipe that the child will write to
            2 => ["pipe", "w"]   // stderr is a pipe that the child will write to
        ];

        $process = proc_open($command, $descriptorspec, $pipes, __DIR__);

        if (is_resource($process)) {
            // Write input to the process
            fwrite($pipes[0], json_encode($input));
            fclose($pipes[0]);

            // Capture output and error messages
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            if ($return_value !== 0) {
                return response(['message' => 'Failed to map value', 'error' => $error], 500);
            }

            return [
                'kriteria' => $kriteria->pluck('nama'),
                'data' => $data->pluck('nama'),
                'values' => json_decode($output),
                'weight' => $kriteria->pluck('weight'),
                'jenis' => $kriteria->pluck('jenis'),
            ];
        } else {
            return response(['message' => 'Failed to open process'], 500);
        }
    }

    public function evaluasi()
    {
        $mapped_value = $this->raw_mapped_value();
        $input = [
            "data" => $mapped_value['values'],
            "weight" => $mapped_value['weight'],
            "criteria_kind" => $mapped_value['jenis']
        ];
        $command = "";// "/home/alimulap/.kuliah/college_stuff/spk/value_mapper/target/release/value_mapper '" . json_encode($input) . "'";

        if (PHP_OS_FAMILY === "Linux") {
            $command = "./../../../rust/bin/linux/electre '" . json_encode($input) . "'";
        } elseif (PHP_OS_FAMILY === "Windows") {
            $command = "./../../../rust/bin/windows/electre.exe '" . json_encode($input) . "'";
        }

        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin is a pipe that the child will read from
            1 => ["pipe", "w"],  // stdout is a pipe that the child will write to
            2 => ["pipe", "w"]   // stderr is a pipe that the child will write to
        ];

        $process = proc_open($command, $descriptorspec, $pipes, __DIR__);

        if (is_resource($process)) {
            // Write input to the process
            fwrite($pipes[0], json_encode($input));
            fclose($pipes[0]);

            // Capture output and error messages
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            if ($return_value !== 0) {
                return response(['message' => 'Failed to map value', 'error' => $error], 500);
            }

            $output = json_decode($output, true);

            $data = [];
            $pengajuanBansos = PengajuanBansos::all();

            foreach ($output['nilai_akhir'] as $i => $value) {
                $data[] = [
                    'ranking' => $output['ranking'][$i],
                    'nik' => $pengajuanBansos[$i]->nik,
                    'nama' => $pengajuanBansos[$i]->nama,
                    'nilai' => $value
                ];
            }

            return $data;
        } else {
            return response(['message' => 'Failed to open process'], 500);
        }
    }

    public function create()
    {
        return view('pengajuan_bansos.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|size:16|exists:data_warga,nik',
            'no_kk' => 'required|string|size:16|exists:data_warga,no_kk',
            'kondisi_rumah' => 'required|in:SEMPURNA,BAIK,LAYAK,BURUK',
            'luas_rumah' => 'required|integer|min:0',
            'status_pernikahan' => 'required|in:BELUM/TIDAK,MENIKAH,JANDA/DUDA',
            'pekerjaan' => 'required|string|max:25',
            'jml_tanggungan' => 'required|integer|min:0',
            'jml_pendapatan' => 'required|integer|min:0',
            'tag_listrik' => 'required|integer|min:0',
            'tag_air' => 'required|integer|min:0',
        ]);

        // Simpan data ke database
        PengajuanBansos::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'kondisi_rumah' => $request->kondisi_rumah,
            'luas_rumah' => $request->luas_rumah,
            'status_pernikahan' => $request->status_pernikahan,
            'pekerjaan' => $request->pekerjaan,
            'jml_tanggungan' => $request->jml_tanggungan,
            'jml_pendapatan' => $request->jml_pendapatan,
            'tag_listrik' => $request->tag_listrik,
            'tag_air' => $request->tag_air,
            'status' => 'menunggu',
        ]);

        // Redirect ke halaman sukses atau daftar pengajuan
        return redirect()->route('bansos.daftar_pengajuan')->with('success', 'Pengajuan bansos berhasil disimpan.');
    }
}
