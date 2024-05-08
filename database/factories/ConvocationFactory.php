<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convocation>
 */
class ConvocationFactory extends Factory
{
	public function definition(): array
	{
		$name = fake()->sentence(10, true);
		return [
			'name' => $name,
			'date_time' => fake()->dateTimeThisDecade(),
			'location' => fake()->address(),
			'description' => fake()->sentence(100, true),
			'slug' => Str::slug($name),
		];
	}
}
