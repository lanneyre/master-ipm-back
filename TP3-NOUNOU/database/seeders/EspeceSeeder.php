<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EspeceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('especes')->insert([
            // Races de chiens
            [
                'nom' => 'Chien',
                'description' => 'Chiens',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chat',
                'description' => 'Chat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Oiseau',
                'description' => 'Oiseau',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Rongeur',
                'description' => 'Rongeur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Nac',
                'description' => 'Nac',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
