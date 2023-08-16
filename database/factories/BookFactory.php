<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
	public function definition(): array
	{
		return [
			'uuid' => Str::uuid(),
			'title' => fake()->sentence($nbWords = 6, $variableNbWords = true),
			'authors' => fake()->name(),
			'isbn' => fake()->word(),
			'publicated_at' => fake()->date(),
		];
	}
}
