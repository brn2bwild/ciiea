<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Software>
 */
class SoftwareFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$name = fake()->sentence(3, true);
		return [
			'name' => $name,
			'description' => fake()->text(100),
			'url' => fake()->url(),
			'slug' => Str::slug($name),
		];
	}
}
