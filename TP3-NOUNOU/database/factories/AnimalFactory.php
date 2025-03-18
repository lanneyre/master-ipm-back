<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Race;
use App\Models\Status;
use App\Models\Animal;
use App\Models\Critere;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Générer une date de naissance aléatoire entre il y a 10 ans et aujourd'hui
        $dob = $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d');
        // Récupérer des races aléatoires pour race, race_mere et race_pere
        $race = Race::inRandomOrder()->first();
        $raceMere = Race::inRandomOrder()->first();
        $racePere = Race::inRandomOrder()->first();

        return [
            'nom' => $this->faker->firstName,
            'description' => $this->faker->paragraph,
            'sexe' => $this->faker->randomElement(['m', 'f']),
            'dob' => $dob,
            'race' => $race->id,
            'race_mere' => $raceMere->id,
            'race_pere' => $racePere->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    // Ajouter une méthode pour associer des statuts aux animaux
    public function configure()
    {
        return $this->afterCreating(function (Animal $animal) {
            // Associer un statut aléatoire à l'animal
            $status = Status::inRandomOrder()->first();
            $animal->statuses()->attach($status->id, [
                'date' => now()->format('Y-m-d'), // Date du statut
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $criteres = Critere::inRandomOrder()->limit(random_int(1, 5))->get();
            foreach ($criteres as $critere) {
                $animal->criteres()->attach($critere->id, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
