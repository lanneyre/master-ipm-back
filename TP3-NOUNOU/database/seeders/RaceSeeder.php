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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Berger Allemand',
                'caracteristiques' => 'Loyal, courageux, obéissant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Golden Retriever',
                'caracteristiques' => 'Doux, intelligent, joueur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bulldog Français',
                'caracteristiques' => 'Joueur, affectueux, têtu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chihuahua',
                'caracteristiques' => 'Petit, vif, courageux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Shiba Inu',
                'caracteristiques' => 'Indépendant, loyal, propre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Beagle',
                'caracteristiques' => 'Curieux, amical, énergique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Dalmatien',
                'caracteristiques' => 'Énergique, sociable, tacheté',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Doberman',
                'caracteristiques' => 'Loyal, protecteur, intelligent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Rottweiler',
                'caracteristiques' => 'Courageux, loyal, puissant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Boxer',
                'caracteristiques' => 'Joueur, énergique, loyal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Caniche',
                'caracteristiques' => 'Intelligent, élégant, hypoallergénique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Teckel',
                'caracteristiques' => 'Joueur, têtu, courageux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Husky Sibérien',
                'caracteristiques' => 'Énergique, sociable, yeux bleus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cocker Spaniel',
                'caracteristiques' => 'Doux, joueur, affectueux',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Races de chats
            [
                'nom' => 'Persan',
                'caracteristiques' => 'Calme, doux, indépendant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Siamois',
                'caracteristiques' => 'Sociable, bavard, curieux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maine Coon',
                'caracteristiques' => 'Grand, doux, joueur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bengal',
                'caracteristiques' => 'Actif, joueur, pelage tacheté',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Ragdoll',
                'caracteristiques' => 'Doux, calme, affectueux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'British Shorthair',
                'caracteristiques' => 'Calme, indépendant, pelage dense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Sphynx',
                'caracteristiques' => 'Sans poils, affectueux, énergique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chartreux',
                'caracteristiques' => 'Calme, doux, pelage bleu-gris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Norvégien',
                'caracteristiques' => 'Grand, robuste, pelage long',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Abyssin',
                'caracteristiques' => 'Actif, curieux, pelage tiqueté',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Races d'autres animaux
            [
                'nom' => 'Canari',
                'caracteristiques' => 'Chanteur, coloré, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Perroquet',
                'caracteristiques' => 'Intelligent, bavard, coloré',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cochon d\'Inde',
                'caracteristiques' => 'Sociable, doux, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Hamster',
                'caracteristiques' => 'Nocturne, joueur, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Lapin Nain',
                'caracteristiques' => 'Doux, sociable, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Poisson Rouge',
                'caracteristiques' => 'Facile à entretenir, coloré, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Gécko Léopard',
                'caracteristiques' => 'Nocturne, facile à entretenir, petit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Tortue',
                'caracteristiques' => 'Lente, longue durée de vie, calme',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
