<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RTUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rt_user')->insert([
            [
                'user_id' => 14,
                'RT' => '01'
            ],
            [
                'user_id' => 16,
                'RT' => '01'
            ],
            [
                'user_id' => 18,
                'RT' => '01'
            ],
            [
                'user_id' => 22,
                'RT' => '01'
            ],
        ]);
    }
}
