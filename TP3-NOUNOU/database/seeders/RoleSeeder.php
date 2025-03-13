<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insérer des données de test
        DB::table('roles')->insert([
            // Races de chiens
            [
                'nom' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Adoptant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Personnel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
