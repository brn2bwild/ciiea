<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VinculationDocumentFactory extends Factory
{
	public function definition(): array
	{
		return [
			'name' => fake()->sentence(3, true),
			'description' => fake()->sentence(50, true),
		];
	}
}
