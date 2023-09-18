<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
		$title = fake()->sentence(7, true);
		return [
			'title' => $title,
			'authors' => fake()->name(),
			'short_description' => fake()->text(100),
			'publicated_at' => fake()->date(),
			'slug' => Str::slug($title),
		];
	}
}
