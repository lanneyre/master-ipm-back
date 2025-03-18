<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Insérer des données de test
        DB::table('races')->insert([
            // Races de chiens
            [
                'nom' => 'Labrador Retriever',
                'caracteristiques' => 'Amical, énergique, intelligent',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Berger Allemand',
                'caracteristiques' => 'Loyal, courageux, obéissant',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Golden Retriever',
                'caracteristiques' => 'Doux, intelligent, joueur',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bulldog Français',
                'caracteristiques' => 'Joueur, affectueux, têtu',
                'espece_id' => 1,

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chihuahua',
                'caracteristiques' => 'Petit, vif, courageux',
                'espece_id' => 1,

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Shiba Inu',
                'caracteristiques' => 'Indépendant, loyal, propre',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Beagle',
                'caracteristiques' => 'Curieux, amical, énergique',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Dalmatien',
                'caracteristiques' => 'Énergique, sociable, tacheté',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Doberman',
                'caracteristiques' => 'Loyal, protecteur, intelligent',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Rottweiler',
                'caracteristiques' => 'Courageux, loyal, puissant',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Boxer',
                'caracteristiques' => 'Joueur, énergique, loyal',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Caniche',
                'caracteristiques' => 'Intelligent, élégant, hypoallergénique',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Teckel',
                'caracteristiques' => 'Joueur, têtu, courageux',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Husky Sibérien',
                'caracteristiques' => 'Énergique, sociable, yeux bleus',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cocker Spaniel',
                'caracteristiques' => 'Doux, joueur, affectueux',
                'espece_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Races de chats
            [
                'nom' => 'Persan',
                'caracteristiques' => 'Calme, doux, indépendant',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Siamois',
                'caracteristiques' => 'Sociable, bavard, curieux',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maine Coon',
                'caracteristiques' => 'Grand, doux, joueur',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bengal',
                'caracteristiques' => 'Actif, joueur, pelage tacheté',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Ragdoll',
                'caracteristiques' => 'Doux, calme, affectueux',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'British Shorthair',
                'caracteristiques' => 'Calme, indépendant, pelage dense',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Sphynx',
                'caracteristiques' => 'Sans poils, affectueux, énergique',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chartreux',
                'caracteristiques' => 'Calme, doux, pelage bleu-gris',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Norvégien',
                'caracteristiques' => 'Grand, robuste, pelage long',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Abyssin',
                'caracteristiques' => 'Actif, curieux, pelage tiqueté',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Races d'autres animaux
            [
                'nom' => 'Canari',
                'caracteristiques' => 'Chanteur, coloré, petit',
                'espece_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Perroquet',
                'caracteristiques' => 'Intelligent, bavard, coloré',
                'espece_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cochon d\'Inde',
                'caracteristiques' => 'Sociable, doux, petit',
                'espece_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Hamster',
                'caracteristiques' => 'Nocturne, joueur, petit',
                'espece_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Lapin Nain',
                'caracteristiques' => 'Doux, sociable, petit',
                'espece_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Poisson Rouge',
                'caracteristiques' => 'Facile à entretenir, coloré, petit',
                'espece_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Gécko Léopard',
                'caracteristiques' => 'Nocturne, facile à entretenir, petit',
                'espece_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Tortue',
                'caracteristiques' => 'Lente, longue durée de vie, calme',
                'espece_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
