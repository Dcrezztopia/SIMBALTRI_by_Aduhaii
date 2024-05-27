<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()
            ->createMany([
                [
                    'username' => 'ikan',
                    'role' => 'admin',
                    'password' => bcrypt('12345')
                ],
                [
                    'username' => 'budi',
                    'role' => 'user',
                    'password' => bcrypt('12345')
                ]
            ]);
    }
}
