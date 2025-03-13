<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Tronquer les tables
        DB::table('criteres')->truncate();
        DB::table('statuses')->truncate();
        DB::table('races')->truncate();
        DB::table('animals')->truncate();
        DB::table('status_animals')->truncate();
        DB::table('animal_critere')->truncate();
        DB::table('roles')->truncate();
        // Réactiver les vérifications des contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            CritereSeeder::class,
            StatusSeeder::class,
            RaceSeeder::class,      // Assure-toi que les races sont créées en premier
            AnimalSeeder::class,   // Ajoute cette ligne
            RoleSeeder::class,
            UserSeeder::class,
            TemoignageSeeder::class,
            ServiceSeeder::class
        ]);
    }
}
