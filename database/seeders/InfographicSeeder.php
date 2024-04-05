<?php

namespace Database\Seeders;

use App\Models\Infographic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfographicSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Infographic::factory(10)->create();
	}
}
