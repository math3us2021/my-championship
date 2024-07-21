<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChampionshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            ['name' => 'Championship 1', 'created_at' => now()],
            ['name' => 'Championship 2', 'created_at' => now()],
            ['name' => 'Championship 3', 'created_at' => now()],
            ['name' => 'Championship 4', 'created_at' => now()],
            ['name' => 'Championship 5', 'created_at' => now()],
            ['name' => 'Championship 6', 'created_at' => now()],
            ['name' => 'Championship 7', 'created_at' => now()],
            ['name' => 'Championship 8', 'created_at' => now()],
        ]);
    }
}
