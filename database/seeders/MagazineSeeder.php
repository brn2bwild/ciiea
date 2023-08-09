<?php

namespace Database\Seeders;

use App\Models\Magazine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MagazineSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Magazine::factory(10)->create();
	}
}
