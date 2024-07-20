<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            ['name' => 'Team 1', 'created_at' => now()],
            ['name' => 'Team 2', 'created_at' => now()],
            ['name' => 'Team 3', 'created_at' => now()],
            ['name' => 'Team 4', 'created_at' => now()],
            ['name' => 'Team 5', 'created_at' => now()],
            ['name' => 'Team 6', 'created_at' => now()],
            ['name' => 'Team 7', 'created_at' => now()],
            ['name' => 'Team 8', 'created_at' => now()],
        ]);
    }
}
