<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Magazine>
 */
class MagazineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
					'name' => fake()->sentence(5, true),
					'publication_date' => fake()->date(),
					'tags' => json_encode([
						'ciencia', 'matemáticas', 'física',
					])
        ];
    }
}
