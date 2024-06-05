<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerbandinganKriteriaBansos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // INSERT INTO perbandingan_kriteria
        //     (left_id, right_id, left_val, right_val)
        // VALUES
        //     (1, 2, 3, 1),
        //     (1, 3, 1, 3),
        //     (1, 4, 1, 4),
        //     (1, 5, 1, 3),
        //     (1, 6, 5, 1),
        //     (1, 7, 1, 3),
        //     (1, 8, 1, 3),
        //     (2, 3, 3, 1),
        //     (2, 4, 1, 5),
        //     (2, 5, 1, 4),
        //     (2, 6, 1, 6),
        //     (2, 7, 1, 4),
        //     (2, 8, 1, 4),
        //     (3, 4, 1, 3),
        //     (3, 5, 1, 5),
        //     (3, 6, 1, 6),
        //     (3, 7, 1, 5),
        //     (3, 8, 1, 5),
        //     (4, 5, 3, 1),
        //     (4, 6, 1, 5),
        //     (4, 7, 2, 1),
        //     (4, 8, 3, 1),
        //     (5, 6, 3, 1),
        //     (5, 7, 4, 1),
        //     (5, 8, 4, 1),
        //     (6, 7, 3, 1),
        //     (6, 8, 2, 1),
        //     (7, 8, 5, 1)
        // ;



        DB::table('perbandingan_kriteria')->insert([
            [ 'right_id' => 2, 'left_id' => 1, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 3, 'left_id' => 1, 'right_val' => 3, 'left_val' => 1, ],
            [ 'right_id' => 4, 'left_id' => 1, 'right_val' => 4, 'left_val' => 1, ],
            [ 'right_id' => 5, 'left_id' => 1, 'right_val' => 3, 'left_val' => 1, ],
            [ 'right_id' => 6, 'left_id' => 1, 'right_val' => 1, 'left_val' => 5, ],
            [ 'right_id' => 7, 'left_id' => 1, 'right_val' => 3, 'left_val' => 1, ],
            [ 'right_id' => 8, 'left_id' => 1, 'right_val' => 3, 'left_val' => 1, ],
            [ 'right_id' => 3, 'left_id' => 2, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 4, 'left_id' => 2, 'right_val' => 5, 'left_val' => 1, ],
            [ 'right_id' => 5, 'left_id' => 2, 'right_val' => 4, 'left_val' => 1, ],
            [ 'right_id' => 6, 'left_id' => 2, 'right_val' => 6, 'left_val' => 1, ],
            [ 'right_id' => 7, 'left_id' => 2, 'right_val' => 4, 'left_val' => 1, ],
            [ 'right_id' => 8, 'left_id' => 2, 'right_val' => 4, 'left_val' => 1, ],
            [ 'right_id' => 4, 'left_id' => 3, 'right_val' => 3, 'left_val' => 1, ],
            [ 'right_id' => 5, 'left_id' => 3, 'right_val' => 5, 'left_val' => 1, ],
            [ 'right_id' => 6, 'left_id' => 3, 'right_val' => 6, 'left_val' => 1, ],
            [ 'right_id' => 7, 'left_id' => 3, 'right_val' => 5, 'left_val' => 1, ],
            [ 'right_id' => 8, 'left_id' => 3, 'right_val' => 5, 'left_val' => 1, ],
            [ 'right_id' => 5, 'left_id' => 4, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 6, 'left_id' => 4, 'right_val' => 5, 'left_val' => 1, ],
            [ 'right_id' => 7, 'left_id' => 4, 'right_val' => 1, 'left_val' => 2, ],
            [ 'right_id' => 8, 'left_id' => 4, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 6, 'left_id' => 5, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 7, 'left_id' => 5, 'right_val' => 1, 'left_val' => 4, ],
            [ 'right_id' => 8, 'left_id' => 5, 'right_val' => 1, 'left_val' => 4, ],
            [ 'right_id' => 7, 'left_id' => 6, 'right_val' => 1, 'left_val' => 3, ],
            [ 'right_id' => 8, 'left_id' => 6, 'right_val' => 1, 'left_val' => 2, ],
            [ 'right_id' => 8, 'left_id' => 7, 'right_val' => 1, 'left_val' => 5, ],
        ]);
    }
}
