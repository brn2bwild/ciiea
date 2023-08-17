<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convocation>
 */
class ConvocationFactory extends Factory
{
	public function definition(): array
	{
		return [
			'name' => fake()->sentence(10, true),
			'date' => fake()->date(),
			'time' => fake()->time(),
			'location' => fake()->address(),
			'description'=>fake()->sentence(150, true)
		];
	}
}
