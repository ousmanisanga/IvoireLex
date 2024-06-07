<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loi>
 */
class LoiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'statut' => $this->faker->randomElement(['en vigueur', 'abreggé']),
            'typeLoi' => $this->faker->randomElement(['constitution', 'ordonnance', 'decret']),
            'titre' => $this->faker->sentence,
            'datePublication' => $this->faker->date,
            'numeroLoi' => $this->faker->word,
            'annexe' => $this->faker->word,
            'contenu' => $this->faker->paragraph,
        ];
    }
}
