<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\KriteriaBansos;
use App\Models\KriteriaMappedScore;
use App\Models\PengajuanBansos;
use App\Models\PerbandinganKriteriaBansos;
use App\Models\PerhitunganAhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// use Illuminate\Http\Request;

class BansosController extends Controller
{
    private $sidebarItems;
    private $activeSidebarItem;

    public function __construct()
    {
        $this->sidebarItems = (new Sidebar())->getItems();
    }

    public function index()
    {
    }

    public function riwayat()
    {
        $this->activeSidebarItem = ['bansos', 'riwayat'];
        return view('bansos.riwayat')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function permintaan()
    {
        $this->activeSidebarItem = ['bansos', 'permintaan'];
        return view('bansos.permintaan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function pengajuan()
    {
        $this->activeSidebarItem = ['bansos', 'pengajuan'];
        return view('bansos.pengajuan')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function data()
    {
        $this->activeSidebarItem = ['bansos', 'data'];
        return view('bansos.data')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function evaluasi_penerima()
    {
        $this->activeSidebarItem = ['bansos', 'evaluasi-penerima'];
        return view('bansos.evaluasi-penerima')
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function penerima()
    {
        $this->activeSidebarItem = ['bansos', 'penerima'];
        return view('bansos.penerima')
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
            foreach ($request->all_perbandingan as $perbandingan) {
                $p = PerbandinganKriteriaBansos::firstWhere(
                    [
                        'right_id' => $perbandingan['right_id'],
                        'left_id' => $perbandingan['left_id']
                    ]);
                $p->left_val = $perbandingan['left_val'];
                $p->right_val = $perbandingan['right_val'];
                $p->save();
                Log::info($p);
            }
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

public function mapped_value() {
    $kriteria = KriteriaBansos::select('id', 'nama', 'jenis', 'jenis_score', 'weight', 'column_name', 'weight')->get();
    $mapper = KriteriaMappedScore::all();
    $data = PengajuanBansos::all();
    $input = [
        'kriteria' => $kriteria,
        'mapper' => $mapper,
        'data' => $data
    ];

    $command = "/home/alimulap/.kuliah/college_stuff/spk/value_mapper/target/release/value_mapper '" . json_encode($input) . "'";

    $descriptorspec = [
        0 => ["pipe", "r"],  // stdin is a pipe that the child will read from
        1 => ["pipe", "w"],  // stdout is a pipe that the child will write to
        2 => ["pipe", "w"]   // stderr is a pipe that the child will write to
    ];

    $process = proc_open($command, $descriptorspec, $pipes);

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
}
