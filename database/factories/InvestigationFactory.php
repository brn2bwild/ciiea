<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investigation>
 */
class InvestigationFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title' => fake()->sentence(7, true),
			'authors' => fake()->name(),
			'short_description' => fake()->text(100),
			'publicated_at' => fake()->date(),
		];
	}
}
