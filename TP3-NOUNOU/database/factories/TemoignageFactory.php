<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temoignage>
 */
class TemoignageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $u = random_int(0, 1) == 0 ? null : User::where("role", 2)->inRandomOrder()->first();
        $animal = random_int(0, 1) == 0 ? null : Animal::inRandomOrder()->first();
        return [
            'user' => $u,
            'animal' => $animal,
            'titre' => $this->faker->text,
            'texte' => implode("<br>", $this->faker->paragraphs),
            'note'  => random_int(3, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
