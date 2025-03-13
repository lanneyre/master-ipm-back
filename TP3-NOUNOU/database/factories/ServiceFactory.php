<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "titre" => $this->faker->text,
            "description" => implode("<br>", $this->faker->paragraphs),
            "prix" => $this->faker->randomFloat(2, 10, 1000),
            "img1" => $this->faker->image,
            "img2" => $this->faker->image,
            "img3" => $this->faker->image,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
