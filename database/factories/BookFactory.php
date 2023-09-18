<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
	public function definition(): array
	{
		$title = fake()->sentence(6, true);
		return [
			'title' => $title,
			'authors' => fake()->name(),
			'isbn' => fake()->word(),
			'publicated_at' => fake()->date(),
			'slug' => Str::slug($title),
		];
	}
}
