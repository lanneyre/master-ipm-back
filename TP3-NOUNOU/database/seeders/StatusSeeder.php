<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Insérer des données de test
        DB::table('statuses')->insert([
            [
                'nom' => 'Quarantaine',
                'description' => 'L\'animal est en quarantaine pour des raisons de santé ou comportementales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'À l\'adoption',
                'description' => 'L\'animal est disponible pour adoption et cherche une famille aimante.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Adopté',
                'description' => 'L\'animal a trouvé une famille et a été adopté avec succès.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'En soins',
                'description' => 'L\'animal reçoit actuellement des soins médicaux ou est en convalescence.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'En famille d\'accueil',
                'description' => 'L\'animal est temporairement placé dans une famille d\'accueil en attendant une adoption permanente.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Indisponible',
                'description' => 'L\'animal n\'est pas disponible pour adoption pour des raisons diverses (santé, comportement, etc.).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Décédé',
                'description' => 'L\'animal est malheureusement décédé.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'En attente de validation',
                'description' => 'Le statut de l\'animal est en cours de validation par l\'équipe du refuge.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Réservé',
                'description' => 'L\'animal est réservé pour une adoption en attente de finalisation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'En évaluation',
                'description' => 'L\'animal est en cours d\'évaluation comportementale ou médicale.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
