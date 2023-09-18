<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MagazineFactory extends Factory
{
	public function definition(): array
	{
		$name = fake()->sentence(5, true);
		return [
			'name' => $name,
			'publicated_at' => fake()->date(),
			'slug' => Str::slug($name),
		];
	}
}
