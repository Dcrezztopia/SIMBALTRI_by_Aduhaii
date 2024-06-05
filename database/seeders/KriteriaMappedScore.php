<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaMappedScore extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// INSERT INTO kriteria_mapped_score
//     (kriteria_id, value, score)
// VALUES
//     (1, 'buruk', 1),
//     (1, 'layak', 2),
//     (1, 'baik', 3),
//     (1, 'sempurna', 4),
//     (2, '0..1000', 1),
//     (2, '1000..2500', 2),
//     (2, '2500..5000', 3),
//     (2, '5000..7000', 4),
//     (2, '7000..10000', 5),
//     (3, 'MENIKAH', 1),
//     (3, 'BELUM/TIDAK', 2),
//     (3, 'JANDA/DUDA', 3),
//     (4, 'Tidak Bekerja', 4),
//     (4, 'Petani', 3),
//     (4, 'Buruh Harian Lepas', 3),
//     (4, 'Pedagang', 2),
//     (4, 'Wiraswasta', 1),
//     (4, 'PNS', 1),
//     (4, 'Polri', 1),
//     (5, '8..INF', 4),
//     (5, '5..8', 3),
//     (5, '3..5', 2),
//     (5, '1..3', 1),
//     (6, '0..1500000', 4),
//     (6, '1500000..2600000', 3),
//     (6, '2600000..3500000', 2),
//     (6, '3500000..INF', 1),
//     (7, '0..200000', 4),
//     (7, '200000..500000', 3),
//     (7, '500000..1000000', 2),
//     (7, '1000000..INF', 1),
//     (8, '0..1', 4),
//     (8, '1..500000', 3),
//     (8, '500000..1000000', 2),
//     (8, '1000000..INF', 1)
// ;
        DB::table('kriteria_mapped_score')->insert([
            [ 'kriteria_id' => 1, 'value' => 'buruk', 'score' => 1, ],
            [ 'kriteria_id' => 1, 'value' => 'layak', 'score' => 2, ],
            [ 'kriteria_id' => 1, 'value' => 'baik', 'score' => 3, ],
            [ 'kriteria_id' => 1, 'value' => 'sempurna', 'score' => 4, ],
            [ 'kriteria_id' => 2, 'value' => '0..1000', 'score' => 1, ],
            [ 'kriteria_id' => 2, 'value' => '1000..2500', 'score' => 2, ],
            [ 'kriteria_id' => 2, 'value' => '2500..5000', 'score' => 3, ],
            [ 'kriteria_id' => 2, 'value' => '5000..7000', 'score' => 4, ],
            [ 'kriteria_id' => 2, 'value' => '7000..10000', 'score' => 5, ],
            [ 'kriteria_id' => 3, 'value' => 'MENIKAH', 'score' => 1, ],
            [ 'kriteria_id' => 3, 'value' => 'BELUM/TIDAK', 'score' => 2, ],
            [ 'kriteria_id' => 3, 'value' => 'JANDA/DUDA', 'score' => 3, ],
            [ 'kriteria_id' => 4, 'value' => 'Tidak Bekerja', 'score' => 4, ],
            [ 'kriteria_id' => 4, 'value' => 'Petani', 'score' => 3, ],
            [ 'kriteria_id' => 4, 'value' => 'Buruh Harian Lepas', 'score' => 3, ],
            [ 'kriteria_id' => 4, 'value' => 'Pedagang', 'score' => 2, ],
            [ 'kriteria_id' => 4, 'value' => 'Wiraswasta', 'score' => 1, ],
            [ 'kriteria_id' => 4, 'value' => 'PNS', 'score' => 1, ],
            [ 'kriteria_id' => 4, 'value' => 'Polri', 'score' => 1, ],
            [ 'kriteria_id' => 5, 'value' => '8..INF', 'score' => 4, ],
            [ 'kriteria_id' => 5, 'value' => '5..8', 'score' => 3, ],
            [ 'kriteria_id' => 5, 'value' => '3..5', 'score' => 2, ],
            [ 'kriteria_id' => 5, 'value' => '1..3', 'score' => 1, ],
            [ 'kriteria_id' => 6, 'value' => '0..1500000', 'score' => 4, ],
            [ 'kriteria_id' => 6, 'value' => '1500000..2600000', 'score' => 3, ],
            [ 'kriteria_id' => 6, 'value' => '2600000..3500000', 'score' => 2, ],
            [ 'kriteria_id' => 6, 'value' => '3500000..INF', 'score' => 1, ],
            [ 'kriteria_id' => 7, 'value' => '0..200000', 'score' => 4, ],
            [ 'kriteria_id' => 7, 'value' => '200000..500000', 'score' => 3, ],
            [ 'kriteria_id' => 7, 'value' => '500000..1000000', 'score' => 2, ],
            [ 'kriteria_id' => 7, 'value' => '1000000..INF', 'score' => 1, ],
            [ 'kriteria_id' => 8, 'value' => '0..1', 'score' => 4, ],
            [ 'kriteria_id' => 8, 'value' => '1..500000', 'score' => 3, ],
            [ 'kriteria_id' => 8, 'value' => '500000..1000000', 'score' => 2, ],
            [ 'kriteria_id' => 8, 'value' => '1000000..INF', 'score' => 1, ],
        ]);
    }
}
